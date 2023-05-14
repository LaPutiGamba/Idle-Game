CREATE DATABASE aaragon;
USE aaragon;

CREATE TABLE STRUCTURES (
    id INT NOT NULL AUTO_INCREMENT,
    positionFeedMill INT, -- Numero para los cuadrados que se crearan predestinados
    cooldownFeedMill TIMESTAMP,
    recipeFeedMill INT, -- 0 para ninguno, 1 para la primera receta de comida de animales, etc

    positionChickenCoop INT, -- Numero para los cuadrados que se crearan predestinados
    cooldownChickenCoop TIMESTAMP,

    positionCowPasture INT, -- Numero para los cuadrados que se crearan predestinados
    cooldownCowPasture TIMESTAMP,

    positionBakery INT, -- Numero para los cuadrados que se crearan predestinados
    cooldownBakery TIMESTAMP,
    recipeBakery INT, -- 0 para ninguno, 1 para la primera receta, etc
    PRIMARY KEY (id)
);

CREATE TABLE USERS (
	id INT NOT NULL AUTO_INCREMENT,
    /* USER INFO */
    username VARCHAR(32) NOT NULL,
    password VARCHAR(32) NOT NULL,
    email VARCHAR(256),
    experience INT,
    diamons INT, -- Coin for accelerate actions, buy coins, etc

    /* USER MATERIALS SAVED IN THE BARN */
    wheat INT,
    corn INT,
    soyBean INT,
    sugarCane INT,
    carrot INT,
    pumpkin INT,

    /* USER TIME OF MATERIALS */
    timeFieldCrop1 INT,
    timeFieldCrop2 INT,
    timeFieldCrop3 INT,
    timeFieldCrop4 INT,
    timeFieldCrop5 INT,
    timeFieldCrop6 INT,

    /* USER SELECTION FOR EACH FIELD CROP */
    cropInField1 INT,
    cropInField2 INT,
    cropInField3 INT,
    cropInField4 INT,
    cropInField5 INT,
    cropInField6 INT,

    /* FOOD MATERIALS SAVED IN THE BARN */
    chickenFeed INT,
    cowFeed INT,
    pigFeed INT,

    /* UPGRADE MATERIALS FOR BARN */
    bolt INT, -- Perno
    plank INT, -- Tabla de madera
    ductTape INT, -- Cinta adhesiva

    /* USER ANIMALS*/
    chicken INT,
    cow INT,
    pig INT,
    UNIQUE(username, email),
    farmStructures INT,
    PRIMARY KEY (id),
    FOREIGN KEY (farmStructures) REFERENCES STRUCTURES (id)
);

CREATE TABLE RECIPES (
    id INT NOT NULL AUTO_INCREMENT,
    nameRecipe VARCHAR(25),
    numRecipe INT NOT NULL,
    levelRequired INT,
    time INT,
    sellingPrice INT,
    wheat INT,
	corn INT,
    soyBean INT,
    sugarCane INT,
    carrot INT,
    pumpkin INT,
	eggs INT,
	milk INT,
	bacon INT,
	bread INT,
	cream INT,
	butter INT,
	cheese INT,
	brownSugar INT,
    PRIMARY KEY (id)
);