/* HAY DAY 

- Se empieza con 6 plazas para plantar
- Solo se tiene maíz en un inicio
- Hay una parcela para meter gallinas (hace falta comprarla)
- Hay una máquina para hacer comida, la moledora (hace falta comprarla)


-- MATERIALS --
Wheat (lvl 1 - 1m)
Corn (lvl 2 - 5m)
Soy Bean (lvl 5 - 20m)
Sugar Cane (lvl 7 - 30m)
Carrot (lvl 9 - 10m)
Pumpkin (lvl 15 - 3h)


-- ANIMALS --
Chicken Coop (lvl 1, lvl 12 and lvl 23 - 5 coins) - x6 chickens capacity
Chicken (lvl 1 - 20 coins, lvl 12 - 140 coins and lvl 23 - 270 coins) - Eggs (20m)

Cow Pasture (lvl 6, lvl 15 and lvl 27 - 20 coins) - x5 cows capacity
Cow (lvl 6 - 50 coins, lvl 15 - 600 coins and lvl 32 - 1150 coins) - Milk (1h)

Pig Pen (lvl 10, lvl 18 and lvl 32 - 150 coins) - x5 pig capacity
Pig (lvl 10 - 500 coins, lvl 18 - 1400 coins and lvl 32 - 2300 coins) - Bacon (4h)


-- STRUCTURES --
Bakery (lvl 2 - 20 coins)
RECIPES
    - 1 (lvl 2): Bread (5m - selling it are 21 coins | x3 wheat)
    - 2 (lvl 7): Corn Bread (30m - selling it are 73 coins | x2 corn, x2 eggs)
    - 3 (lvl 10): Cookie (1h - selling it are 104 coins | x2 wheat, x2 eggs, x1 brownSugar)

Feed Mill (lvl 3 - 5 coins and lvl 12 - 3200 coins)
RECIPES (always gives x3)
    - 1 (lvl 3): Chicken feed (5m - selling it are 7 coins | x2 wheat, x1 corn)
    - 2 (lvl 6): Cow feed (10m - selling it are 14 coins | x1 corn, x2 soyBean)
    - 3 (lvl 10): Pig feed (20m - selling it are 14 coins | x1 soyBean, x2 carrot)

Dairy (lvl 6 - 50 coins)
RECIPES
    - 1 (lvl 6): Cream (20m - selling it are 50 coins | x1 milk)
    - 2 (lvl 9): Butter (30m - selling it are 82 coins | x2 milk)
    - 3 (lvl 12): Cheese (1h - selling it are 122 coins | x3 milk)

Sugar Mill (lvl 7 - 350 coins)
RECIPES
    - 1 (lvl 7): Brown sugar (20m - selling it are 32 coins | x1 sugarCane)

Popcorn Pot (lvl 8 - 650 coins)
RECIPES
    - 1 (lvl 8): Popcorn (30m - selling it are 32 coins | x2 corn)
    - 2 (lvl 16): Buttered popcorn (1h - selling it are 126 coins | x2 corn, x1 butter)

BBQ Grill (lvl 9 - 730 coins)
RECIPES
    - 1 (lvl 9): Pancake (30m - selling it are 108 coins | x3 eggs, x1 brownSugar)
    - 2 (lvl 11): Bacon and eggs (1h - selling it are 201 coins | x4 eggs, x2 bacon)
    - 3 (lvl 18): Hamburguer (2h - selling it are 180 coins | x2 bread, x2 bacon)

Pie Oven (lvl 14 - 2200 coins)
RECIPES
    - 1 (lvl 14): Carrot pie (1h - selling it are 82 coins | x3 carrot, x2 wheat, x1 eggs)
    - 2 (lvl 15): Pumpkin Pie (2h - selling it are 158 coins | x3 pumpkin, x2 wheat, x1 eggs)
    - 3 (lvl 18): Bacon Pie (3h - selling it are 219 coins | x2 wheat, x3 bacon, x1 eggs)


---- Se va al pueblo caminando para vender el maiz al principio pero luego ya se tiene una propia tienda (hace falta comprar el puesto) para vender ----
---- Se pone la cuadrícula de forma manual y solo pueden dejar las cosas en ciertas zonas ----*/

/******************************************************************************/

/*CREATE BD*/
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


/******************************************************************************/

/*INSERTS/SELECTS/UPDATES BD

- Registrarse*/
INSERT INTO USERS VALUES ('username', 'password', 'email');

/*- Loguearse*/
SELECT username FROM USERS WHERE username='username' && password='password';

/*- Sumar experiencia para los niveles*/
UPDATE USERS SET experience=0 WHERE username='username';

/*- Plantar materiales (se resta 1 de material por cada plantado)*/
SELECT material1 FROM USERS WHERE username='username';
UPDATE USERS SET material1=0 WHERE username='username';

/*- Coger materiales (se suman 2 de material por cada recogido)*/
SELECT material2 FROM USERS WHERE username='username';
UPDATE USERS SET material2=0 WHERE username='username';

/*- Crear comida (tarda tiempo y se restan algunos materiales necesarios para hacer la comida)*/
SELECT material3 FROM USERS WHERE username='username';
UPDATE USERS SET material3=0 WHERE username='username';

/*- Coger comida creada (se suma la comida al inventario)*/
SELECT food FROM USERS WHERE username='username';
UPDATE USERS SET food=0 WHERE username='username';

/*- Comprar animales (se resta dinero y se suma el animal)*/
SELECT coins FROM USERS WHERE username='username';
UPDATE USERS SET coins=0 WHERE username='username';

SELECT animals FROM USERS WHERE username='username';
UPDATE USERS SET animals=0 WHERE username='username';

/*- Coger materiales de los animales (se suma el material)*/
SELECT animalMaterial FROM USERS WHERE username='username';
UPDATE USERS SET animalMaterial=0 WHERE username='username';

/*- Coger materiales de mejora*/
SELECT upgradeMaterial FROM USERS WHERE username='username';
SELECT upgradeMaterial FROM USERS WHERE username='username';
SELECT upgradeMaterial FROM USERS WHERE username='username';