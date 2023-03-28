

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cui` varchar(25) DEFAULT NULL,
  `onrc` varchar(100) DEFAULT NULL,
  `address` text NOT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8mb4;


INSERT INTO clients VALUES
("173","Andronache Claudia Sandra Cristina","","","str. Lunga, nr.82, Brasov Judet: Brasov","","","0758557428",""),
("177","Bogdan Iordache","","","calea giulesti,nr.8,sector 6,bucuresti,showroom toyota","","","0730017658",""),
("178","Voicu Ana-Maria","","","Strada Bozieni, Nr.7, Bl.830, Sc.3, Ap.90, Parter, Sector 6, Bucuresti","","","0763507902",""),
("179","Seimeneanu Adelina","","","Str Hatman Luca Arbore, Nr. 29, Constanta","","","0758205171",""),
("180","Andra Dobrea","","","str gradistea nr 15, bl b1, sc 3, et 4, ap 47, Sector 4, Bucuresti","","","0726379905",""),
("181","Gaetan Alexandru - Nicolae","","","Str.Pinilor , Nr.2 , Bl.A , Sc.D , Ap.73 , Et.3, Cernavoda, Constanta","","","0765031651",""),
("182","vasiloiu carmen","","","strada pitesti, nr 43, Slatina, Olt","","","0766646869",""),
("183","Dante International S.A.","RO14399840","J40/372/2002","148 Virtutii, E47, Bucuresti, 060787","RO73INGB0001008199078940","ING BANK","",""),
("184","Dan Claudiu","","","str. George enescu, bl 200i, sc 1, ap 8, Dolj, Craiova","","","0772221712",""),
("185","Burz Alexandra","","","strada Poligonului, bl B11, et 4, ap 18, Alba Iulia, Alba","","","0742732211",""),
("186","Coti Florin","","","Bistrița Str Artarilor Nr 18 Bl 18 SC A Ap 4, Bistrita, Bistrita-Nasaud","","","0755905946",""),
("187","Bulboaca Lucian","","","Str Hagi Chiriac, nr. 1, Vaslui, Vaslui","","","0743925999",""),
("188","Stefan Pop","","","Lusca 72, Lusca, Bistrita-Nasaud","","","0751672649",""),
("189","Mureșan Ancuța Grațiela","","","Strada Infratirii Nr9 Bl B6 Ap32, Dej, Cluj","","","0763605290",""),
("190","marius charcovschi","","","bd 1 Decembrie 1918,bloc M4, Mangalia, Constanta","","","0722513162",""),
("191","Gheorghe Zavate","","","sat Popesti,nr.106,comuna Farcasa, Popesti, Neamt","","","0746341550",""),
("192","Adina Popescu","","","Strada Pelbartus, complex Europa 1, 1, Timisoara, Timis","","","0741633252",""),
("193","Moise ana adriana","","","Răsăritului nr 1 bl 118 sc b et 8 ap 85, Sectorul 6, Bucuresti","","","0768313487",""),
("194","Deac Adi","","","Nr 50. Strada principala, Mures, Rusii-Munti","","","0774424154",""),
("195","Schiaua Mihai","","","Splaiul Independentei nr 313, Universitatea Politehnica Bucuresti, Facultatea de Energetica, Sectorul 6, Bucuresti ","","","0722664832",""),
("196","Mitroi Denisa-Mihaela","","","Bd. Dacia, Nr. 14, Bl. 139 B, Sc. 1, Ap. 12, Craiova, Dolj","","","0725389375",""),
("236","test","","","test","","","",""),
("237","Cristian matei","","","Str. etc 1","","","0771059667","romanleonard@outlook.com");




CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(50) NOT NULL,
  `client` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`client`)),
  `number` int(11) NOT NULL,
  `date` date NOT NULL,
  `items` text NOT NULL,
  `shipping_price` varchar(25) NOT NULL,
  `price_total` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  `storno_items` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=442 DEFAULT CHARSET=utf8;


INSERT INTO invoices VALUES
("307","BIZ","{\"name\":\"Andronache Claudia Sandra Cristina\",\"address\":\"str. Lunga, nr.82, Brasov Judet: Brasov\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0758557428\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","1","2020-09-04","[{\"item_name\":\"Ceas unisex Casio Vintage, digital - A168WEC-1EF\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"210\"},{\"item_name\":\"Discount produse\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-30\"}]","15","195","normal",""),
("312","BIZ","{\"name\":\"Bogdan Iordache\",\"address\":\"calea giulesti,nr.8,sector 6,bucuresti,showroom toyota\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0730017658\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","2","2020-09-08","[{\"item_name\":\"Ceas barbatesc G-Shock - DW-5600BBN-1ER\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"550\"},{\"item_name\":\"Discount produse\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-120\"}]","0","430","normal",""),
("314","BIZ","{\"name\":\"Voicu Ana-Maria\",\"address\":\"Strada Bozieni, Nr.7, Bl.830, Sc.3, Ap.90, Parter, Sector 6, Bucuresti\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0763507902\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","3","2020-09-17","[{\"item_name\":\"Ceas dama Q&Q - QA21J212Y\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"115\"}]","19.98","134.98","normal",""),
("315","BIZ","{\"name\":\"Seimeneanu Adelina\",\"address\":\"Str Hatman Luca Arbore, Nr. 29, Constanta\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0758205171\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","4","2020-09-17","[{\"item_name\":\"Ceas pentru copii Casio - LW-203-1BVEF\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"190\"}]","19.98","209.98","normal",""),
("316","BIZ","{\"name\":\"Andra Dobrea\",\"address\":\"str gradistea nr 15, bl b1, sc 3, et 4, ap 47, Sector 4, Bucuresti\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0726379905\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","5","2020-09-21","[{\"item_name\":\"Ceas barbatesc G-Shock - DW-5600BB-1ER\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"530\"},{\"item_name\":\"Discount produse\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-116\"}]","8.99","422.99","normal",""),
("318","BIZ","{\"name\":\"Gaetan Alexandru - Nicolae\",\"address\":\"Str.Pinilor , Nr.2 , Bl.A , Sc.D , Ap.73 , Et.3, Cernavoda, Constanta\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0765031651\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","6","2020-10-05","[{\"item_name\":\"Ceas unisex Q&Q - RP00J007Y\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"149.90\"}]","19.98","169.88","normal",""),
("319","BIZ","{\"name\":\"vasiloiu carmen\",\"address\":\"strada pitesti, nr 43, Slatina, Olt\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0766646869\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","7","2020-10-05","[{\"item_name\":\"Ceas de dama Casio - LA670WEFL-9EF\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"299.99\"}]","19.98","319.97","normal",""),
("320","BIZ","{\"name\":\"Dante International S.A.\",\"address\":\"148 Virtutii, E47, Bucuresti, 060787\",\"cui\":\"RO14399840\",\"onrc\":\"J40\\/372\\/2002\",\"phone\":\"\",\"iban\":\"RO73INGB0001008199078940\",\"bank\":\"ING BANK\",\"email\":\"\"}","8","2020-10-05","[{\"item_name\":\"Despagubire comanda 128944288\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"80.33\"}]","none","80.33","normal",""),
("321","BIZ","{\"name\":\"Dan Claudiu\",\"address\":\"str. George enescu, bl 200i, sc 1, ap 8, Dolj, Craiova\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0772221712\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","9","2020-10-08","[{\"item_name\":\"Ceas de dama Casio Baby-G - BAX-100-7AER\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"580\"},{\"item_name\":\"Discount produse\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-35\"}]","0","545","normal",""),
("322","BIZ","{\"name\":\"Gaetan Alexandru - Nicolae\",\"address\":\"Str.Pinilor , Nr.2 , Bl.A , Sc.D , Ap.73 , Et.3, Cernavoda, Constanta\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0765031651\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","10","2020-10-13","[{\"item_name\":\"Ceas unisex Q&Q - RP00J007Y\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":-149.9}]","-19.98","-169.88","storno",""),
("323","BIZ","{\"name\":\"Burz Alexandra\",\"address\":\"strada Poligonului, bl B11, et 4, ap 18, Alba Iulia, Alba\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0742732211\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","11","2020-10-13","[{\"item_name\":\"Ceas unisex - AQ-230A-7DMQYES\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"199\"}]","8.99","207.99","normal",""),
("324","BIZ","{\"name\":\"Coti Florin\",\"address\":\"Bistri\\u021ba Str Artarilor Nr 18 Bl 18 SC A Ap 4, Bistrita, Bistrita-Nasaud\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0755905946\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","12","2020-10-13","[{\"item_name\":\"Ceas barbatesc Casio - AQ-S800WD-1EVEF\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"349\"}]","19.98","368.98","normal",""),
("325","BIZ","{\"name\":\"Bulboaca Lucian\",\"address\":\"Str Hagi Chiriac, nr. 1, Vaslui, Vaslui\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0743925999\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","13","2020-10-13","[{\"item_name\":\"Ceas dama Casio - LTP-2088L-2AV\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"334\"}]","19.98","353.98","normal",""),
("326","BIZ","{\"name\":\"Stefan Pop\",\"address\":\"Lusca 72, Lusca, Bistrita-Nasaud\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0751672649\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","14","2020-10-15","[{\"item_name\":\"Ceas barbatesc Q&Q - M122J012Y\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"149\"}]","19.98","168.98","normal",""),
("327","BIZ","{\"name\":\"Burz Alexandra\",\"address\":\"strada Poligonului, bl B11, et 4, ap 18, Alba Iulia, Alba\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0742732211\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","15","2020-10-15","[{\"item_name\":\"Ceas unisex - AQ-230A-7DMQYES\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":-199}]","-8.99","-207.99","storno",""),
("328","BIZ","{\"name\":\"Mure\\u0219an Ancu\\u021ba Gra\\u021biela\",\"address\":\"Strada Infratirii Nr9 Bl B6 Ap32, Dej, Cluj\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0763605290\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","16","2020-10-15","[{\"item_name\":\"Ceas barbatesc Casio G-Shock - GA-100GBX-1A4ER\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"610\"},{\"item_name\":\"Discount produse\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-81\"}]","0","529","normal",""),
("329","BIZ","{\"name\":\"marius charcovschi\",\"address\":\"bd 1 Decembrie 1918,bloc M4, Mangalia, Constanta\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0722513162\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","17","2020-10-21","[{\"item_name\":\"Ceas barbatesc Casio Edifice - EFS-S510D-2AVUEF\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"1000\"},{\"item_name\":\"Discount produse\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-184\"}]","0","816","normal",""),
("330","BIZ","{\"name\":\"Gheorghe Zavate\",\"address\":\"sat Popesti,nr.106,comuna Farcasa, Popesti, Neamt\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0746341550\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","18","2020-10-28","[{\"item_name\":\"Ceas barbatesc Casio G-Shock - DW-5600E-1VER\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"485\"},{\"item_name\":\"Discount produse\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-89\"}]","19.98","415.98","normal",""),
("331","BIZ","{\"name\":\"Adina Popescu\",\"address\":\"Strada Pelbartus, complex Europa 1, 1, Timisoara, Timis\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0741633252\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","19","2020-11-02","[{\"item_name\":\"Ceas Casio pentru copii - LW-203-1BVEF\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"217\"}]","19.98","236.98","normal",""),
("332","BIZ","{\"name\":\"Moise ana adriana\",\"address\":\"R\\u0103s\\u0103ritului nr 1 bl 118 sc b et 8 ap 85, Sectorul 6, Bucuresti\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0768313487\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","20","2020-11-02","[{\"item_name\":\"Ceas de dama Q&Q - VP35J009Y\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"99.91\"}]","19.98","119.89","normal",""),
("333","BIZ","{\"name\":\"Deac Adi\",\"address\":\"Nr 50. Strada principala, Mures, Rusii-Munti\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0774424154\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","21","2020-11-03","[{\"item_name\":\"Ceas barbatesc Casio - AE-1000W-3AVEF\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"240\"},{\"item_name\":\"Discount produse\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-48\"}]","19.98","211.98","normal",""),
("334","BIZ","{\"name\":\"Schiaua Mihai\",\"address\":\"Splaiul Independentei nr 313, Universitatea Politehnica Bucuresti, Facultatea de Energetica, Sectorul 6, Bucuresti \",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0722664832\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","22","2020-11-10","[{\"item_name\":\"Ceas barbatesc Q&Q - VS54J001Y\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"260\"},{\"item_name\":\"Discount produse\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-60.01\"}]","19.98","219.97","normal",""),
("335","BIZ","{\"name\":\"Mitroi Denisa-Mihaela\",\"address\":\"Bd. Dacia, Nr. 14, Bl. 139 B, Sc. 1, Ap. 12, Craiova, Dolj\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0725389375\",\"iban\":\"\",\"bank\":\"\",\"email\":\"\"}","211","2020-11-10","[{\"item_name\":\"Ceas de dama Casio - LTP-1281PD-7AEF\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"235\"},{\"item_name\":\"Discount produse\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-46\"}]","8.99","197.99","normal",""),
("438","BIZ","{\"name\":\"Cristian matei\",\"address\":\"Str. etc 1\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0771059667\",\"iban\":\"\",\"bank\":\"\",\"email\":\"romanleonard@outlook.com\"}","212","2022-07-12","[{\"item_name\":\"Mouse gaming Logitech M105\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"299.99\"},{\"item_name\":\"Discount produse\",\"item_um\":\"-\",\"item_qty\":\"1\",\"item_price\":\"-9.99\"}]","0","290","normal",""),
("439","BIZ","{\"name\":\"Cristian matei\",\"address\":\"Str. etc 1\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0771059667\",\"iban\":\"\",\"bank\":\"\",\"email\":\"romanleonard@outlook.com\"}","213","2022-07-12","[{\"item_name\":\"Mouse gaming Logitech M105\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-299.99\"},{\"item_name\":\"Discount produse\",\"item_um\":\"-\",\"item_qty\":\"1\",\"item_price\":\"9.99\"}]","none","-290","storno",""),
("440","BIZ","{\"name\":\"Cristian matei\",\"address\":\"Str. etc 1\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0771059667\",\"iban\":\"\",\"bank\":\"\",\"email\":\"romanleonard@outlook.com\"}","214","2022-07-12","[{\"item_name\":\"Mouse gaming Logitech M105\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-299.99\"}]","none","-299","storno",""),
("441","BIZ","{\"name\":\"Cristian matei\",\"address\":\"Str. etc 1\",\"cui\":\"\",\"onrc\":\"\",\"phone\":\"0771059667\",\"iban\":\"\",\"bank\":\"\",\"email\":\"romanleonard@outlook.com\"}","215","2022-07-12","[{\"item_name\":\"Mouse gaming Logitech M105\",\"item_um\":\"buc.\",\"item_qty\":\"1\",\"item_price\":\"-299.99\"},{\"item_name\":\"Discount produse\",\"item_um\":\"-\",\"item_qty\":\"1\",\"item_price\":\"9.99\"}]","none","-290","storno","");


