
###Karim Khairat
###Written for use with MySQL
###Add data into database


DROP TABLE IF EXISTS `Spatulas` ;

CREATE TABLE IF NOT EXISTS `Spatulas` (
  `idSpatula` INT NOT NULL,
  `ProductName` VARCHAR(50) NOT NULL,
  `Type` ENUM('Food','Drugs','Paint','Plaster') NOT NULL,
  `Size` VARCHAR(50) NOT NULL,
  `Colour` VARCHAR(50) NOT NULL,
  `Price` DECIMAL(10,2) NOT NULL,
  `QuantityInStock` INT NOT NULL,
  PRIMARY KEY (`idSpatula`))
ENGINE = InnoDB;\


INSERT INTO Spatulas VALUES(1,"Walter White Spatula","Drugs","50","Orange","20.08",5);
INSERT INTO Spatulas VALUES(2,"SpongeBob Spatula","Food","10","Yellow","19.99",0);
INSERT INTO Spatulas VALUES(3,"Bob The Builder Spatula","Plaster","15","Blue","0.99",50);
INSERT INTO Spatulas VALUES(4,"DaVinci Spatula","Paint","20","Brown","14.52",2);
INSERT INTO Spatulas VALUES(5,"Rotten Spatula","Food","8","Green","1.99",200);
INSERT INTO Spatulas VALUES(6,"Stockless Spatula","Drugs","40","Pink","9.99",0);
INSERT INTO Spatulas VALUES(7,"Sticky Spatula","Food","6","Green","5.99",0);
INSERT INTO Spatulas VALUES(8,"Painted Spatula","Paint","24","Rainbow","22.99",0);
INSERT INTO Spatulas VALUES(9,"Cemented Spatula","Plaster","60","Grey","8.99",0);
INSERT INTO Spatulas VALUES(10,"PlasteringGem Spatula","Plaster","20","Black","15.52",5);


