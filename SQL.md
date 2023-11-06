## Criar o Banco
```
    CREATE SCHEMA userscrud DEFAULT CHARACTER SET utf8mb4 ;
```

## Criar tabela users
```
    CREATE TABLE userscrud.users (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    PRIMARY KEY (id));
```

## Criar a tabela setores
```
    CREATE TABLE userscrud.setores (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    PRIMARY KEY (id));
```

## Criar a tabela user_setores
```
    CREATE TABLE userscrud.user_setores (
    setor_id INT NULL,
    user_id INT NULL);
```

## Criar a procedure update_setores_user
```
    DROP PROCEDURE IF EXISTS update_setores_user;
    DELIMITER //
    CREATE PROCEDURE update_setores_user(IN vuser_id INT, IN vlista_setores TEXT)
    BEGIN
        DECLARE vi INT;
        DECLARE vsetor_id INT;
        SET vi = 1;
        
        -- Cria uma tabela temporária para armazenar os IDs de setores que estão na lista_setores
        CREATE TEMPORARY TABLE temp_setores (setor_id INT);

        
        WHILE vi < LENGTH(vlista_setores) DO
            -- Extrai o próximo setor da lista
            SET vsetor_id = CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(vlista_setores, ',', vi), ',', -1) AS SIGNED);
            
            -- Verifica se o setor já existe para o usuário
            IF NOT EXISTS (SELECT 1 FROM user_setores WHERE user_id = vuser_id AND setor_id = vsetor_id) THEN
                -- Se o setor não existe, insire
                INSERT INTO user_setores (user_id, setor_id) VALUES (vuser_id, vsetor_id);
            END IF;
            
            -- Popula a tabela temporária com os IDs de setores que estão na lista_setores
            INSERT INTO temp_setores (setor_id) VALUES (vsetor_id);
            
            SET vi = vi + 1;
        END WHILE;
        
        -- Exclui registros em user_setores que não estão na lista_setores
        DELETE FROM user_setores WHERE user_id = vuser_id AND setor_id NOT IN (SELECT setor_id FROM temp_setores);
        
        DROP TEMPORARY TABLE temp_setores;
    END;
    //
    DELIMITER ;
```

## Criar a trigger delete_setores_users
```
    DELIMITER //
    CREATE TRIGGER delete_setores_users
    BEFORE DELETE ON setores
    FOR EACH ROW
    BEGIN
        DELETE FROM user_setores WHERE setor_id = OLD.id;
    END;
    //
    DELIMITER ;
```

## Criar a trigger delete_user_setores
```
    DELIMITER //
    CREATE TRIGGER delete_user_setores
    BEFORE DELETE ON users
    FOR EACH ROW
    BEGIN
        DELETE FROM user_setores WHERE user_id = OLD.id;
    END;
    //
    DELIMITER ;
```