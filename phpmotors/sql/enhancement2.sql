INSERT INTO clients (clientFirstName, clientLastName, clientEmail, clientPassword, comment)
    VALUES ('Tony','Stark','tony@starkent.com','Iam1ronM@n', '"I am the real Ironman"');

UPDATE clients
    SET clientLevel = '3';

UPDATE inventory
    SET invDescription = REPLACE(invDescription, 'small', 'spacious')
    WHERE invModel = 'hummer';

SELECT inventory.invModel, carclassification.classificationName
FROM inventory
INNER JOIN carclassification on inventory.classificationId = carclassification.classificationId
WHERE carclassification.classificationName = 'SUV';

DELETE FROM inventory WHERE inventory.invId = '1';

UPDATE inventory
SET invImage = CONCAT('/phpmotors', invImage), invThumbnail = CONCAT('/phpmotors', invThumbnail);