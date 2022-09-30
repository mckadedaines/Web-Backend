INSERT INTO clients (clientFirstName, clientLastName, clientEmail, clientPassword, comment)
    VALUES ('Tony','Stark','tony@starkent.com','Iam1ronM@n', '"I am the real Ironman"');

UPDATE clients
    SET clientLevel = '3';

UPDATE inventory
    SET invDescription = REPLACE(invDescription, 'small', 'spacious')
    WHERE invModel = 'hummer';



