<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        //PROMOTOR RICHARD
//        Cliente::create(['codcliente'=>'101636','nombrecliente'=>'VERONICA QUIROZ MAMANI','estado'=>'a','idpromotor'=>'1','idmercado'=>'1']);
//        Cliente::create(['codcliente'=>'101805','nombrecliente'=>'ALEX EDUARDO CABALLERO','estado'=>'a','idpromotor'=>'1','idmercado'=>'1']);
//        Cliente::create(['codcliente'=>'101637','nombrecliente'=>'WILSON RIVAS MEDRANO','estado'=>'a','idpromotor'=>'1','idmercado'=>'1']);
//        Cliente::create(['codcliente'=>'101525','nombrecliente'=>'FABIOLA CARLA AGUILAR','estado'=>'a','idpromotor'=>'1','idmercado'=>'2']);
//        Cliente::create(['codcliente'=>'100520','nombrecliente'=>'TERESA POMA','estado'=>'a','idpromotor'=>'1','idmercado'=>'2']);
//
//        //PROMOTOR WILMAR
//        Cliente::create(['codcliente'=>'100400','nombrecliente'=>'MAIRA CORONEL','estado'=>'a','idpromotor'=>'2','idmercado'=>'9']);
//        Cliente::create(['codcliente'=>'101535','nombrecliente'=>'JAIME TERRAZAS','estado'=>'a','idpromotor'=>'2','idmercado'=>'22']);
//        Cliente::create(['codcliente'=>'100896','nombrecliente'=>'NICOL SEJAS','estado'=>'a','idpromotor'=>'2','idmercado'=>'28']);
//        Cliente::create(['codcliente'=>'101877','nombrecliente'=>'EVANGELINA RODRIGUEZ','estado'=>'a','idpromotor'=>'2','idmercado'=>'29']);

//
//     //CLIENTES OFICINA
    //    $oficina = ['POLLO GOYITA','SALT. PANTANAL','SALT. HAMACIEL','POLLO BISMUCOR','SALT. TARUPESAL','WILDER DELGADILLO CAMPANA','SACURA MECHERO','POLLO ANGELA','MARGARITA ESTRADA','SACURA AMERICA','POLLO AMBORO','SALT. QUIRQUINCHO','SHAWARMAA RAHMAN','SHAWARMA HELMI','SHAWARMA MOHAMED','DEISY ROJAS','POLLO JOSUE','POLLO EL BUEN SAMARITANO','POLLO CITY SUC. 1','POLLO URKUPIÑA','NEYER TOLEDO','RESTAURANT LA BRASIL ','DOCTOR DONNER','MARCELO LA FUENTE','POLLO CARLING Z. 4 ANILLO CENTENARIO','POLLO COQUETO','POLLO SUPER THIAGO'];
    //    $codoficina = ['101198','101501','102465','102484','102533','102549','102372','101831','102444','102371','102322','100718','102408','102413','102407','102131','102234','101510','102472','102582','101538','102152','101347','102389','102431','102391','102168'];
    //    //dd($oficina[1]);
    //    for ($i=0 ; $i< count($nombres) ; $i++){
    //        DB::table('clientes')->insert([
    //            'nombrecliente'=>$oficina[i],
    //            'codcliente'=>$codoficina[i],
    //            'estado'=>'a',
    //            'idpromotor'=> 5,
    //            'idmercado'=> 39
    //        ]);
    //     };

    //CLIENTES MELISA  8        
    //    $melmutualista =['MIRTHA VILLARRUEL HUANCA','SANDRA ISABEL ARIAS CARBAJAL','MELVY TITO TARIFA','ALEJANDRA ENRIQUEZ MORALES','NELY RIVERO MENACHO','POLLO SOLARES','CARMEN MORALES','LUCIA ARANCIBIA MCDO MUTUALISTA','MILENA ROBLES MCDO MUTUALISTA','ROXANA SILES','DIMELSA VELASCO mutualista 60986089-72695185','MERY PEREZ mutualista','MARINA LOPEZ mutualista','MARTHA PEREZ mutualista','YOVANNA LENIS TOLA CALAT 77604520','JUANA JULIA COCA mutual 60882319-67887661','CAROLA CASTRO mutualista 76071602-61340118','SABINA NEGRETE','LUCY CAMPOS mutualista','MIRIAN TORRICO mutualista','KAREN ARIAS mutualista 76012794','LOURDES CUELLAR mutualista','SRA TESORO','MAYRA CRUZ ROBLES','YANETH QUIROGA -  MUTUALISTA','SHIRLEY PEREIRA mutualista','YOVANA TORRICO 79803020','LEONARDO PEÑA mutualista 70918739','DANIELA FLORA PEREZ CABRERA mutualista 76697087','POLLO PIO LINDO (ROSALIA ESCALERA) mutualista','POLLO SANTA BRASA av alemana 8vo anillo 61367459','YENNY SILVA mutualista','POLLO RAP 2do anillo v de cotoca y brasil 73149996','YOLANDA RIVERA cerca matadero (paga agapito albañil)','SERGIO  centenario 3er y 4to anillo c/10 casa 5','NAPOLEON CABRERA mutualista','DORIS SOSA mutualista','LORENA PARAVICINI','MARCELO DAVALOS - MUTUALISTA','WILBER HUANCA mutualista','ROMILDA PEÑA  mutualista','VANESA ARIAS PONCE- MUTIATISTA','ROBERTO IVAN SAAVEDRA MUTUALISTA','MARY ZENTENO ROCHA MCDO MUTUALISTA','RONALD CONDORI PEREZ'];
    //    $codmelmutualista=['102093','102169','102663','102664','102260','102319','102347','102383','102489','102619','100009','100013','100018','100019','100020','100021','100023','100030','100031','100038','100041','100044','100207','100243','100323','100325','100355','100405','100493','100521','100524','100534','100566','100590','100693','100694','100742','101131','101167','101253','101312','101884','101966','102004','102066'];
    //    for ($i=0 ; $i< count($melmutualista) ; $i++){
    //         DB::table('clientes')->insert([
    //             'nombrecliente'=>$melmutualista[$i],
    //             'codcliente'=>$codmelmutualista[$i],
    //             'estado'=>'a',
    //             'idpromotor'=> 8,
    //             'idmercado'=> 19
    //         ]);
    //     };

    //     $melbraseros = ['CHICKEN SPRINFIELD','z POLLO RIZZIO av lujan  6to 71617975','z GRAN MURALLA los lotes 70084141','z POLLO YESSICA centenario 3 al 4to anillo 65042934','z POLLO PIKO RICO piray 68838058','REST. EDIL TERCEROS Fono:'];
    //     $codmelbraseros = ['102621','100442','100484','100503','100536','101705'];
    //     for ($i=0 ; $i< count($melbraseros) ; $i++){
    //         DB::table('clientes')->insert([
    //             'nombrecliente'=>$melbraseros[$i],
    //             'codcliente'=>$codmelbraseros[$i],
    //             'estado'=>'a',
    //             'idpromotor'=> 8,
    //             'idmercado'=> 39
    //         ]);
    //     };

    //     $mel25mayo = ['RUBEN ESCOBAR','VICTOR BAUTISTA','CRISTINA QUISBERT abasto','RUBEN VALLEJOS abasto','KATERINE DIAZ abasto','DORA CABRERA','CRISTINA SALAZAR abasto','SOLEDAD CHAYAPA','NICOL VALDEZ','JHONNY CONTRERAS','VANIA GUTIERREZ 68821714','Z - JUDITH CARDOZO abasto 76661320','JIMENA JAUJA (deuda antigua)','ANA MONTAÑO TAPIA abasto','DELICIA ARNEZ mcdo abasto','SANTA IVANA ESCOBAR GUTIERREZ 75353980'];
    //     $codmel25mayo = ['100016','100236','100237','100240','100241','100268','100269','100272','100378','100426','100604','100618','100646','100905','101039','101742'];
    //     for ($i=0 ; $i< count($mel25mayo) ; $i++){
    //         DB::table('clientes')->insert([
    //             'nombrecliente'=>$mel25mayo[$i],
    //             'codcliente'=>$codmel25mayo[$i],
    //             'estado'=>'a',
    //             'idpromotor'=> 8,
    //             'idmercado'=> 37
    //         ]);
    //     };

        //CLIENTES JOSE LUIS 9
        $joseAntLosPozos = ['CARMINIA RIOJA MUÑOZ','TATIANA MARCELA MONTAÑO CHUMACERO','KATHIA JUANY NOGALES','KATTUSKA YAMILET TERRAZAS ALARCON','PATRICIA AREABA POZOS ANTIGUO','SAIDA BANEGAS los pozos','MERY LIMA los pozos 78419156','YENNY NINA Los Pozos','OMAR BUSTAMANTE Los Pozos','BRIANDA FERNANDEZ','ERLINDA PANTOJA los pozos 75694286','YAQUELIN ROMERO FLORES los pozos','OLGA MONTAÑO 65042582','JORGE MELGAR los pozos','CARMEN TORRICO los pozos 73100444','BERTHA VARGAS los pozos','MARIELA MOYA','OLGA HINOJOSA','PATRICIA VARGAS MCDO POZOS','ROXANA COSTAS los pozos 74637901','MARGARITA BANEGAS 70015393-70904385-63478932','CARLOS GONZALES los pozos','ELIZABETH CORDOVA  (hermana de estela moron)','TERESA PANTOJA los pozos 73681657','FELIPA QUIROGA','CARMEN BANEGAS','YANETH TERRAZAS Los Pozos','MARGARITA RIOS','BETTY TERCEROS -LOS POZOS  AGENCIA 2 69045750','DANIEL DIAZ','CARMEN CARVAJAL','DAVID ARIAS','GARY PARADA (pozos)','REINA VALE los pozos 71364057','PEDRO GONZALES los pozos','BREIDY MARTINEZ los pozos 76626799','JUAN CARLOS RAMOS ZARATE','LUIS ENRIQUE GARCIA MENDEZ los pozos','GLADYS DE VARGAS los pozos','ANTONIA ANDIA (Nvo Merc. los Pozos)','ELIO ALVAREZ los pozos','GLADYS PACO -LOS POZOS','ESTHER VARGAS los pozos','ALCIRA GARCIA los pozos','MARIA ELENA FLOREZ los pozos','ALICIA MERCADO -SRA ELSA warnes 773551626','LILIANA RODRIGUEZ los pozos','ANA GABRIELA TAPIA FERNANADEZ los pozos 75383537','AIDA PANTOJA los pozos','JOSE ANTONIO JIMENES JUANES 72664999','CLAUDIA MENDOZA LIMA','SONIA GRIMALDES PUMA','RODRIGO PAREDES ROJAS 62013585','ROCIO GARCIA - POZOS','CARMEN ROSA PANTOJA','FIDELIA SAIGUA ROMERO 69136667','DANIEL JOB MIRANDA QUINTEROS','CRISTINA SOLAR'];
        $codjoseAntLosPozos = ['102649','102324','102337','102353','102356','100159','100163','100167','100168','100169','100174','100178','100179','100181','100182','100183','100184','100186','100188','100190','100191','100193','100197','100198','100199','100200','100201','100202','100204','100276','100332','100407','100409','100428','100460','100469','100515','100671','100703','100791','100846','101066','101075','101085','101151','101396','101436','101469','101620','101668','101772','101840','101871','101889','101892','102034','102062','102071'];
        for ($i=0 ; $i< count($joseAntLosPozos) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$joseAntLosPozos[$i],
                'codcliente'=>$codjoseAntLosPozos[$i],
                'estado'=>'a',
                'idpromotor'=> 9,
                'idmercado'=> 20
            ]);
        };

        $joseBraseros =['SHAWARMA HABIBI 62103857','SHAWARMA AISHA','POLLOS URKUPIÑA @ 1','POLLO NEGREÑO@ zona colorada','POLLOS GUVI @','LEIDY CONTRERAS','POLLO NEGREÑO @  3p. al frente','POLLOS HERMANOS (CONTADO)','POLLOS URKUPIÑA @ 3 UCEBOL','POLLOS LESLi @','RESTAURANT KRIOLLO- MELIZA','DAVID LOPEZ CASANOVA 69080507','JUDITH JIMENA MAMANI IBARBE','POLLO MARY CHICKEN','POLLO NEGREÑO @  la cuchilla','FERNANDO RODRIGUEZ KM 9  77010074','SARAH PEDRAZA','REST. UNIVERSITARIO @','AARON VALLEJOS GUTIERREZ','KEVIN ROMERO KM 6','POLLO VALLECITO NORTE','JOSE CARLOS LOZADA','POLLOS CARLING ZONA 4 DE NOVIEMBRE','REST. FREEDON','POLLOS URKUPIÑA @ SUC 2 AV CENTERNARIO','DIEGO CHINO LINARES','POLLOS TRAPICHERO ZONA JARDIN BOTANICO','GABRIELA TONI MIGA','POLLO ROSSY JOSE LUIS','POLLO GUSTOSO','FABIOLA GARCIA','FABIAN ROJAS HERBAS (cabezas)','SALTEÑERIA PIRAI  ALEMANA 7MO ANILLO','SALTEÑERIA BIBOSI','POLLO KM 6 CHINA @','SALTEÑERIA TUCAN 2agosto 7mo y8vo anillo 75075018','REST. NUEVA CHINA omar chavez antes del seg anillo','z-ABNER NAAZAN ALBORONOZ AREQUIPA -satelite','POLLOS CRISTY @','POLLO BRASA PERU','PAMPEÑO BURGER 17 1/2 CEL 69268706','PAMPEÑO BURGER  @ alto s/pedro 69268706','ROMINA ALICIA PAZ SUAREZ  77343132','COILA VARGAS  MERCADO LAZARETO','POLLO NEGREÑO @ zonz centenario','CIRIA VANESSA ESPINOZA OLIVERA  PTO133 Lazareto','ELSA BARGAS COILA -LAZARETO','VIRGINIA ALY -LAZARETO','ADELAIDA MEJIA -LAZARETO','LOMITO YINO 77370070 zona ZOOLOGICO','SALTEÑERIA TOBOROCHI','SHAWARMA NEEMA -ZONA MUTUALISTA 72677569','SALTEÑERIA AMERICA'];
        $codjoseBraseros = ['102091','102094','102097','102643','102646','102667','102679','102626','102632','102111','102197','102207','102213','102219','102253','102278','102289','102296','102311','102314','102346','102377','102417','102423','102425','102449','102482','102503','102513','102522','102581','100005','100117','100499','100579','100601','101118','101318','101588','101648','101701','101763','101902','101930','101939','101970','101971','101972','101975','101980','101997','102014','102037'];
        for ($i=0 ; $i< count($joseBraseros) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$joseBraseros[$i],
                'codcliente'=>$codjoseBraseros[$i],
                'estado'=>'a',
                'idpromotor'=> 9,
                'idmercado'=> 39
            ]);
        };

        $joseMutualista = ['ADRIANA PARADA MACHUCA','ROLANDO VICTOR MAMANI LIMACHI 78501128','KAREN FALON MCDO MUTUALISTA','YOVANI DAVALOS MCDO MUTUALISTA','CRISTINA LEDEZMA MCDO MUTUALISTA','CAROLA ORELLANA MCDO MUTUALISTA','ROXANA CHACON mutualista 65887696-60851423','ERICKA CASTELLON mutualista 73192279','JORGE BALDELOMAR 60937628','LILIANA DURAN','BENILDA PEÑA mutualista 72666631','DANNY LOPEZ 78510626','NATIVIDAD PEÑA mutualista 63475012-69196305','YUDITH CASTELLON mutualista 75620708','EDITH ANTURIANO','NELDA CHACON mutualista 70052904','SONIA DELGADILLO 68739999 semanal','YANETH FRANCO (MURIO)','ANITA ROCHA mutualista 73116058','MARIA JULIA SALDAÑA','Z - FLORA AGUADO','PASTORA ARNEZ','FLORA CABRERA','PAOLA TOLA','LORGIO RUIZ mutualista 76326153','CLEMENTINA GUARACHI ,mutualista 69020061-6920061','MARCELA OVANDO mutualista','YEISON ZELAZA','MIGUEL CRUZ','ARMANDO VILLARROEL CASTELLON mutualista','MARTHA CASTRO mutualista 68753103','GUISELA VACA mutualista','GUISELA CESPEDES mutualista','JORGE BAUTISTA','MOISES CHOQUE','SONIA CARRIZALES 78110713','RODY PERROGON','MARIA JUANA TERRAZAS','TEODORA FUNANILLA mutualista 73166339','MARIA ILLANEZ','ANGELICA CHAVEZ NOOOOOO','DANIELA PRADO','VANIA MANCILLA mutualista','MERY SIBLER mutualista 33747810','ISABEL CANSECA','JORGE LUIS ROMERO','CECILIA PONCE','ANDREA PEÑA','GLORIA SAIWA','VERONICA BERNAL','ANALI SOTO','LIMBERT CARVAJAL','FATIMA CARVAJAL','SILVIA VARGAS RUIZ','FLORENCIO (jean paul lino) (mutualista)','LAURA ENRIQUEZ mutualista 69213172','MIRTHA (mutualista)','YOLANDA (mutualista)','ORLANDO PETIGA','MARIA ISABEL RIOS','ANA LUISA CESPEDEZ','SANTOS CHOQUE','NANCY PEREZ','GUISELA PEREZ mutualista','LAURA RIVERO MUTUALISTA 69213172','SELMA TERCEROS CAERO mutualista','SERGIO DIAZ -MUTUALISTA 78126862','NOELIA ESTHER FLOREZ mutualista hija de clementina huarachi','MARIA CRISTINA ZEBALLOS  nutualista','MARIBEL HUARACHI- MUTUALISTA','NAIDA SOTO OBANDO  MUTUALISTA','CLAUDIA ELENA MACHUCA mutualista','MARINA ISABEL TORREZ FUNDANILLA','BEATRIZ SILES ROJAS mutualista','POLLO DON FLACO - Rad10 5toAnillo Fono:77832314','CEVERINA TARIFA CARVAJAL- MUTUALISTA','JOSE LUIS ADWAN MACHUCA -MUTUALISTA75625352','POLLO FORTIN 77618272','YHON CHRYSTOFER LEON- MUTUALISTA','SANDRA ALVAREZ PEREDO','NATALIA  ASCARRUNZ -MUTUALISTA 69148440'];
        $codjoseMutualista =['102086','102092','102249','102358','102420','102439','100011','100012','100014','100015','100017','100022','100024','100025','100026','100027','100028','100032','100033','100034','100035','100036','100037','100039','100040','100045','100322','100324','100326','100327','100328','100329','100330','100331','100333','100334','100335','100336','100337','100338','100340','100342','100343','100344','100345','100346','100348','100349','100350','100351','100352','100353','100356','100402','100412','100416','100417','100418','100449','100457','100535','100544','100557','100784','100953','100966','100991','101034','101266','101339','101351','101361','101544','101609','101702','101898','101906','101947','101954','101969','101976'];
        for ($i=0 ; $i< count($joseMutualista) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$joseMutualista[$i],
                'codcliente'=>$codjoseMutualista[$i],
                'estado'=>'a',
                'idpromotor'=> 9,
                'idmercado'=> 19
            ]);
        };

        $joseNuevoLosPozos =['IRMA QUIROGA','ISABEL GUEVARA','CAROLINA MELGAR los pozos 79807825','ANA GABRIEL SALVATIERRA los pozos 76386964','LIZBETH PANTOJA','RAMIRO CRUZ','CARMEN PEÑARANDA','EMILSE ARAMAYO','INGRID BANEGAS - los pozos','TERESA QUIROGA','POLLO MARY','PORFIRIA TOLA nuevo los pozos','ALEJANDRO COLQUE ARISPE los pozos71309799','GRACIELA TORRES  los pozos coop.H, nro 94','JOSE ANDY SILVESTRE - n/los pozos 76686522','GIOVANNI CUETO nuevo los pozos 69088907','GABY SOLIZ n/los pozos','ABIGAIL n/los pozos','CARLOS n/los pozos','TERESA GUTIERREZ  n/los pozos','YESIKA ESCOBAR n/los pozos 77063459','Z - YUMA ESCARLET ROJAS MARAÑON los pozos 69030392','CLAUDIA PATRICIA CAMACHO 75048539'];
        $codjoseNuevoLosPozos =['100158','100160','100161','100164','100165','100166','100170','100180','100185','100196','100205','100652','100704','100743','100818','100822','100824','100828','100913','100964','101164','101268','101383'];
        for ($i=0 ; $i< count($joseNuevoLosPozos) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$joseNuevoLosPozos[$i],
                'codcliente'=>$codjoseNuevoLosPozos[$i],
                'estado'=>'a',
                'idpromotor'=> 9,
                'idmercado'=> 17
            ]);
        };

        //CLIENTES CONSUELO 6
        $consueloBraseros = ['REST. EL BUEN GUSTO - COTOCA','ERWIN PAUL PEREIRA HOYOS','MAICOL RICHARD TORRICO AÑEZ','OSCAR FERNANDO LINARES PAZ','CARLA LORENA NATES @','TU ESTACION  FOOD','PACUMUTOS EL DORADO','DR POLLO','LUCY FAST FOOD','MARISOL MENDEZ','WALTER OBED DORADO ZAMORA -7ABRIL','DON GALLO DE CARLOS ARANCIBIA @  78162486','DEUDATA MADINA VIDAL','POLLOS ROLANDO BAUTISTA @ LUJAN','ALDO FUENTES VILARREAL','CARLOS MORENO CERRATE','POLLO DOÑA BERTHA','DANITZA GAMARRA','POLLO  CELIA LOTES','POLLO CALLE 7 @','POLLO A LA LEÑA EL BUEN SABOR @','ROLANDO MENDOZA ORTIZ','POLLO KATERIN @','POLLO ROLANDO MOSCU Cel. 71365716','DR  POLLO - RADIAL 10','POLLO EL BUEN SAMARITANO @'];
        $codconsueloBraseros = ['102647','102654','102657','102658','102659','102672','102678','102685','102686','102688','102143','102264','102458','102502','102515','102516','102530','102532','102548','102595','102602','102645','100880','101272','101344','101510'];
        for ($i=0 ; $i< count($consueloBraseros) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$consueloBraseros[$i],
                'codcliente'=>$codconsueloBraseros[$i],
                'estado'=>'a',
                'idpromotor'=> 6,
                'idmercado'=> 39
            ]);
        };

        $consueloEstArg = ['LAS BRASAS DEL PIERNUDO GRILL 65035454','JOSE LUIS ALMENDRAS- EST. ARGENT Polleria Gutierr','ELMER OLIVA -ESTACION ARGENTINA PUESTO ##9','RAFAEL OLIVA - ESTASION ARGENTINA'];
        $codconsueloEstArg = ['101973','101439','101456','101458'];
        for ($i=0 ; $i< count($consueloEstArg) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$consueloEstArg[$i],
                'codcliente'=>$codconsueloEstArg[$i],
                'estado'=>'a',
                'idpromotor'=> 6,
                'idmercado'=> 40
            ]);
        };

        $consueloGuapilo = ['POLLO PICON - DORADO 71303740','SILVIA EUGENIA REYNAGA CENSANO -DORADO','HUGO ALI MORON ZONA EL DORADO - LUJAN','ESTEFANY FERNANDEZ - LUJAN'];
        $codconsueloGuapilo = ['102090','101785','101431','101455'];
        for ($i=0 ; $i< count($consueloGuapilo) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$consueloGuapilo[$i],
                'codcliente'=>$codconsueloGuapilo[$i],
                'estado'=>'a',
                'idpromotor'=> 6,
                'idmercado'=> 12
            ]);
        };

        $consueloSanJuan = ['ELOY CHURA MAMANI  71307873 san juan a lado de veterinaria','JUAN DIEGO MORALES - JAN JUAN PUESTO 191','DELFICA MAMANI CRUZ 67739971 PUESTO 200 MEC. SAN JUAN'];
        $codconsueloSanJuan = ['101872','101531','101533'];
        for ($i=0 ; $i< count($consueloSanJuan) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$consueloSanJuan[$i],
                'codcliente'=>$codconsueloSanJuan[$i],
                'estado'=>'a',
                'idpromotor'=> 6,
                'idmercado'=> 41
            ]);
        };

        $consueloSinMerc = ['POLLO PANCHO @ 62111390 zona lujan','MARIA LUISA VILLARROEL VASQUEZ 78410407','YOLANDA CORONADO DE ILLANES 69063914','POLLO DON PANCHO - BATEON  68926479'];
        $codconsueloSinMerc = ['101810','101864','102109','101256'];
        for ($i=0 ; $i< count($consueloSinMerc) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$consueloSinMerc[$i],
                'codcliente'=>$codconsueloSinMerc[$i],
                'estado'=>'a',
                'idpromotor'=> 6,
                'idmercado'=> 42
            ]);
        };

        $consueloVilla = ['SALTEÑERIA MOTACU 76669501','GENARO CASTELLON','POLLOS LO QUE CHIQUEN 71619441','JULIO JUNIOR LUISIAGA - Villa','REGINA QUISPE .- VILLA','CRISTINA LIZARRAGA','MARGARITA ALMANZA CRESPO - VILLA','MAICKOL VARGAS RAMIRES - VILLA 78511911','YINA TASEO - VILLA 77882212','YOLANDA ARCE CUBA -VILLA 755553066','MARIA GLORIA SAIHUA BOZO- VILLA','ELIZABETH ELIANA SERRUDO ORIAS 78036994 VILLA FRIAL DU'];
        $codconsueloVilla = ['102098','102099','102233','101185','101404','101423','101444','101480','101482','101484','101515','101540'];
        for ($i=0 ; $i< count($consueloVilla) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$consueloVilla[$i],
                'codcliente'=>$codconsueloVilla[$i],
                'estado'=>'a',
                'idpromotor'=> 6,
                'idmercado'=> 7
            ]);
        };

        //CLIENTES FANNY 7
        $fannyBraseros = ['POLLO CHICKEN HOUS','POLLO ZELAYA  suc 3- MONTERO','POLLO ZELAYA suc 4 - WARNES','SANDWICHERIA WICHES','PUERTO MADERO','JORGE YUCRA BAUTISTA','LOLA FLORES CRUZ','ERICKA LILIANA ARAUZ VACA','POLLO BUENANGO','SALTEÑERIA PATUJU 77072500-69226115','POLLO DOÑA CELIA  -  SATELITE','POLLO ZELAYA  suc 2-  SATELITE 60032230','POLLO PIO PIO @ Zona los Chacos','POLLOS BROILER @','POLLO DOÑA BETTY SATELITE','POLLOS NOEMI @ ZONA LUJAN','BEIMAR MOREIRA LOZAP','SONIA LAURA CAMPOS (LUJAN )','POLLOS GOSEN SATELITE','MARGARITA ESTRADA RIOS','POLLO DOÑA FELY @','POLLO EL CHANEQUE','NERIO SORIA','POLLOS KIKI- RIKI','MAGALY BLASS ZONA TRANSITO','SALTEÑERIA LA PREFERIDA KM 15','POLLO VILLA TUNARI @ ( BATEON )','MARCO ANTONIO MAMANI CONDORI','CHURRASQUERIA AL PASO','POLLOS LLANOS MONTECRISTO','POLLOS LLANOS CHARCAS','NEYZA VALLEJOS HERRERA','DELI POLLO FAST FOOD','MISTER POLLO SATELITE','POLLO SABROSO SATELITE','POLLO URKUPIÑA SATELITE','CATERING CAIROS','EMBUTIDOS IGLU','VERONICA CARBALLO','CHICKEN BURGER 70929411','PATOLANDIA @(Calle Charcas) 76346938','PATOLANDIA @ (monte cristo)-77016160','SALTEÑERIA GUAPURU 8vo anillo final 2agosto 70935155','LINO DURAN  sateite','GREGORIO LLANOS VASQUEZ@ braza b/claveles','POLLO ZELAYA  suc 1-  SATELITE 60032230','POLLO PICON SATELITE - 68968613','POLLO LUJAN @-71616500','POLLO AURORA@'];
        $codfannyBraseros = ['102652','102660','102661','102668','102670','102680','102681','102689','102690','102142','102158','102218','102224','102286','102325','102397','102434','102437','102440','102444','102452','102453','102455','102459','102461','102466','102480','102493','102531','102536','102537','102553','102556','102557','102558','102582','102589','102631','102642','100008','100551','100555','100673','101481','101776','101868','101938','102048','102087'];
        for ($i=0 ; $i< count($fannyBraseros) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$fannyBraseros[$i],
                'codcliente'=>$codfannyBraseros[$i],
                'estado'=>'a',
                'idpromotor'=> 7,
                'idmercado'=> 39
            ]);
        };

        $fannyNvoLosPozos = ['LOURDES LOPEZ CONDORI','KAREN ROJAS CAMACHO 78015132','CECILIA MENDOZA CHAVEZ','VIRGINIA CUENTAS 78589877 NVO POZOS','ARACELY SEJAS NVO POZOS','PAULINA ALVAREZ - NVO POZOS','MARIA DEL CARMEN FLOREZ FUENTES','SAMUEL OJEDA NVO POZOS','OVIDIO DIAS MCDO NVO POZOS','PAOLA SOTELO ZONA CAMBODROMO','CIRO ANTONIO PIÑAS NVO POZOS','MARIA LOURDES CAMAYE NVO POZOS','LUZ CLARITA FERNANDEZ GEREZO','MIGUEL TORRICO ZURITA los pozos 71688116','PEDRO QUENTA  75619162- 76607212','MIRTHA EMMA BRAVO los pozos','AMPARO SAAVEDRA nuevo los pozos','LUZ MARIA ARANDIA (lucy) Nuevo los Pozos 70749172','SANDRA MURILLO n/los pozos 78538817','YANETH NINA CRUZ n/los pozos LA ENTRADA puesto 10 770226','EDGAR RODRIGO PIÑAS DAZA n/los pozos','TEODORA ZUAZO n/los pozos','ABELARDO COLQUE PACO','NATIVIDAD VALENCIA n/los pozos','OSCAR APAZA GOMEZ pozo nvo 76313806 Puesto 25','YAQUELIN ZERDA MORON -','GLADIS MERCADO nvo los pozos','LUCY TERESA PEREZ APAZA','PAOLA DURAN -NUEVO POZO','MELCY MAMANI (FANNY)','DANIELA CALIZAYA HUMACATA  / JOSE ANDY SILVESTRE Z.','ANA PAOLA NAVIA GUTIERREZ POZO NV.','FABIOLA ISABEL TOLA CHOQUE','ISAURA NUEVO LOS POZOS'];
        $codfannyNvoLosPozos = ['102687','102139','102228','102285','102291','102308','102321','102352','102414','102474','102487','102488','102592','100195','100277','100572','100787','100790','100797','100906','100948','101078','101082','101097','101245','101248','101369','101381','101463','101967','101974','102012','102033','102038'];
        for ($i=0 ; $i< count($fannyNvoLosPozos) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$fannyNvoLosPozos[$i],
                'codcliente'=>$codfannyNvoLosPozos[$i],
                'estado'=>'a',
                'idpromotor'=> 7,
                'idmercado'=> 17
            ]);
        };

        $fannySatelite = ['POLLO DON JUAN @ 76669501','JAIME SUAREZ LEDEZMA','POLLO EL BUEN GUSTO SATELITE','SALTEÑERIA MOTACU 76669501','LIZETH MARILIN RIVERA ARIAS 77921340','MARTHA SANDRA LOPEZ B. 60847477','MARIA JOSE NAVA ZABAL 78080370','JANETT CANO 77040027 SATELITE NORTE','CARLOS NUÑEZ SATELITE','POLLOS FRANKEY','POLLO LLANOS SATELITE','SHAWARMA EL ARABE -SATELITE','PENSION VALLE SANCHEZ','EVENTOS VIRGINIA','ARACELY NICOL SANCHEZ CARREÑO','SALTEÑERIA URUGUAY BANZER DEL 7MO ANILLO','ALEJANDRO OCAMPOS CORONADO','SHIRLEY LORENA BELLIDO DELGADILLO','POLLO SANTA FE - 67753351-','JUAN CARLOS GARCIA 75648695','JUANITA QUIROGA MONTAÑO - SATELITE 73159625','SALTEÑERIA TILUCHI - 79064138','SONIA ESTER MARTINEZ - SATELITE'];
        $codfannySatelite = ['102096','102662','102100','102101','102170','102247','102256','102297','102390','102430','102514','102534','102622','102637','102639','100451','100908','101894','101936','102008','102015','102043','102047'];
        for ($i=0 ; $i< count($fannySatelite) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$fannySatelite[$i],
                'codcliente'=>$codfannySatelite[$i],
                'estado'=>'a',
                'idpromotor'=> 7,
                'idmercado'=> 31
            ]);
        };

        //CLIENTES RICHARD 3
        $richardBraseros = ['REINA LLANES SALAZAR 71341183','MARIA GENNY ORTIZ DE JUSTINIANO 77629431','ISABEL CHAMBI UREÑA 74513294','ALFREDO CABALLERO (ROBERT)','WENDY ZAMBRANA 68761746','LILIAN SARA CHUVIRU','POLLO PAPAGALLO 2','POLLO A LA LEÑA EL QUEMADINGO','SERGIO DENNIS MOREJON @','SALTEÑERIA UNIVERSAL 71684481','EDWIN FLOREZ MEDRANO 76333720','POLLO SABROSON  @ v.de cotoca 70934401','EDWIN ALVARES @','POLLOS SACURA - SC. AMERICA','POLLOS SACURA -SUC MECHERO','POLLO CHUPALO @','CARLOS JUSTO @','BIG CHICKEN CUMAVI','RESTAURANT LA BRAZIL','SALTEÑERIA FERLI','POLLO CHESTER ZONA PLAN','ALEX MAURICIO VARGAS PAZ - MUYUPAMPA','SALTEÑERIA HAMACIEL CAMPANA','POLLO CITY','POLLO BISMUCOR ZONA PLAN 3000','POLLO CITY 2','ANGEL ENRRIQUE VACA (SABROSON SUC 2) @','SALTEÑERIA TARUPESAL 67738376','POLLO QUEN','POLLO LUIS PEÑA','SALTEÑERIA WILDER DELGADILLO MONTES (contado)','POLLO BRASA CHICKEN sto dumond','HOTEL RADISSON','SALTEÑERIA ARSENAL 73401401 BLOQUEADO POR MAÑOSA','ENTRE CANTARES Y CANTARITOS 73158057','REST. SABORES & COLORES 79914372','SALTEÑERIA LA ESTRELLITA  ZONA R. CORONADO','POLLO NUEVO SIGLO @ (radial 13) 5to anillo 69269999','SALTEÑERIA POLLO LOCO(PAURITO )','POLLO TIO PEPE las americas','POLLOS EL MANA  5to al 6to anillo y 2 de agosto','POLLO CHRIS suarez arana 78033580','POLLO GOYITA  @','POLLO NUEVO SIGLO @ (radial 13 ) 6to anillo 73626666','SALTEÑERIA TAPIA 8vo anillo y virgen de cotoca 73120480','POLLO PALITO','MAGIN FLORES GUZMAN @','POLLO PEKIN @ 16 DE JULIO','POLLO CHRIS @ VIEDMAN 65941530','POLLO MATIUS @ 16DE JULIO RADIAL 10','POLLO HONG KONG @ 7MO ANILLO R/10','POLLO MAMUT @','POLLOS PAPAGALLO RADIAL@ 17/2 6TO ANILLO 78221247','MARY LUZ TORREZ RODAS 72610669','ALITAS KING POLLOS 71072838','POLLOS ALYS -75329335 zona lotes parada 15','POLLO A LA BRAZA LO MAXIMO 70981137','POLLO MILENITA  -71671227','POLLO LOCO (ARIEL NINA ) PLAN','POLLO COTOCA @','POLLO MATIUS SUCURSAL @ 2Nuevo Guapuru 77086102','SALTEÑERIA LAS PALMAS'];
        $codrichardBraseros = ['101300','102058','102103','102108','102163','102653','102655','102665','102666','102183','102199','102208','102235','102371','102372','102376','102396','102400','102412','102424','102426','102427','102465','102472','102484','102485','102486','102533','102543','102544','102549','102604','102605','102126','102067','102074','100594','100641','100663','100756','100841','101126','101198','101222','101343','101576','101671','101764','101773','101801','101891','101915','101918','101940','101942','101944','101945','101948','101987','101995','102032','102035'];
        for ($i=0 ; $i< count($richardBraseros) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$richardBraseros[$i],
                'codcliente'=>$codrichardBraseros[$i],
                'estado'=>'a',
                'idpromotor'=> 3,
                'idmercado'=> 39
            ]);
        };

        $richardRocaCoronado = ['MARTINA MARTHA RODRIGUEZ','FELIPA CLAROS FLOREZ r.coronado','CLAUDIA IRENE SOLIZ MARISCAL','JEOVANA MITA MCDO ROCA Y CORONADO','DANIEL MORALES','ANA ISABEL BRAVO *','COSME CLAROS FLOREZ  60861136','CRISTIAN DAVID','MARIBEL ZUBIETA BARRIONUEVO'];
        $codrichardRocaCoronado = ['102164','102206','102212','102507','102508','102584','102060','102085','102056'];
        for ($i=0 ; $i< count($richardRocaCoronado) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$richardRocaCoronado[$i],
                'codcliente'=>$codrichardRocaCoronado[$i],
                'estado'=>'a',
                'idpromotor'=> 3,
                'idmercado'=> 24
            ]);
        };

        //CLIENTES WILMAR 4
        $wilmarAbasto = ['CLAUDIA SOLEDAD COCA GUZMAN (ACTIVA )','LUIS ADOLFO LIZARAZU AGUIRRE 70998911','CARLA ESCOBAR ALMENDRAS 60816148','LILY CHAVEZ','NELSON CUEVAS VERAMENO','SULEMA CABRERA abasto 76635874','SOLEDAD ARIAS abasto 75061098','FABIOLA MONTAÑO abasto 71365255','ISABEL USTAREZ','BETTY AREVALO  abasto 76671282','NICOLASA BAUTISTA abasto 76603382','MELANIA CUEVAS abasto 73680331','YANETH CONTRERAS abasto 67824114','KAROLINA QUISBERT abasto 69049186','BLANCA DIAZ abasto 75550640','ELIZA DIAZ abasto 60026703','LOURDES CONTRERAS abasto 70081937','ISABEL RIOS','JULIETA VILLARROEL abasto -77387280','KAREN ARTEAGA','ROSARIO CALLEJAS 78003412','MARGARITA MELGAR abasto','ELIZABETH RIVAS abasto','SHIRLEY MAMANI abasto','CARLA FABIOLA RIVERA  CAMACHO abasto coop 26 78411113','SANDER ESCOBAR abasto puesto 24 62006344-72680874','ALEJANDRA CUELLAR abasto','ALISON GABRIELA ESPADA  ALMENDRAS 60822861','HELEN VALDEZ','CINTYA ARNEZ ARIAS 75086020','PAOLA FLORES','MIRIAN VILLARREAL abasto 75646405','YOVANA JIMENEZ JIMENEZ abasto coop h/27 75306040','GLADYS NINOSKA RENGEL  abasto sur 8 78178307','OSWALDO COCA GUZMAN ( LUCAS )','TOMASA NAVA SERON abasto sur 29','PAOLA ARANIBAR AGUIRRE- 76096058','WENDY OLIVERA DAVILA - ABASTO 78541950','IRENE ZOBEYDA ALDAEN ABASTOSURpuesto1-70392961','NELLY SANTOS abasto campecino 74656787','ERASMO VICENTE USTARES AGUIRRE','MABEL ALMENDRAS C. abasto PUESTO 38 SEC COP 67984349','ESPERANZA LIDIA MALDONADO HINOJOSA abasto 73159875','MARIA ANTONIETA SILES AYALA - ABASTO','ANGEL MEDINA PEREZ - Abasto fono:76098938','ISABEL CHELA SALDIAS 79001726','GABRIELA ALEJANDRA USTARES - ABASTO 75570019','SERAFINA AGUIRRE -ABASTO 61670772','RONALD ESCOBAR abasto 79911472'];
        $codwilmarAbasto = ['102113','102119','102192','102226','102526','100219','100220','100221','100222','100223','100224','100225','100226','100227','100229','100230','100231','100232','100233','100234','100235','100238','100242','100244','100266','100270','100271','100404','100427','100588','101047','101134','101138','101154','101307','101308','101352','101453','101465','101527','101569','101591','101611','101691','101698','101720','101721','101964','102049'];
        for ($i=0 ; $i< count($wilmarAbasto) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$wilmarAbasto[$i],
                'codcliente'=>$codwilmarAbasto[$i],
                'estado'=>'a',
                'idpromotor'=> 4,
                'idmercado'=> 30
            ]);
        };

        $wilmarBraseros = ['POLLO PIÑATA  72158099','POLLO LOLITO@ 67815884','CHICKEN FAMILY -WILMAR','PENSION DOÑA BERTHA 60896652','MERCY ZAMBRANA -CLIENTE DE WILMAR','BISMARK CUELLAR GONZALES 70976530','GRAN HAPPY CHICKEN  70926600','POLLO SABOR A LEÑA 70851303-65006441','SELENA CARRILLO (WILMAR)','POLLO PICHON @ UDABOL','HAMBURGUESAS KRUSTY','SEBASTIAN POMA -SATELITE','MOHAMED MOHAMED ABDELGHANI ABDALLAH','MOHAMED ELSAYED MOAHAMETH ALI MORAD (RAHMAN)','SHAWARMA  HELMI','CRISTIAN ERNESTO VARGAS CASTRO','POLLO PAPUCIN','EL BAR DE MOES @','GAMING BAR','OKY POLLO 77033770','PATO VENTURA  MARCO frente mercado n/ramada 70244083','DANIEL FLOREZ-@ 75569298','POLLO VENCEDOR frente mcdo fortaleza 76650400-67747528','POLLOS VIKINGO  7mo anillo Zna hospit frances 76067673','POLLO ORIENTAL  76037519','POLLO EXPERTO  75090294','POLLO FLORENCIA parada 86 72647261','POLLO KROSTY  @ 3er Anillo 4 d Noviemb 75050155','RINCON DEL POLLO mariscal Sta cruz 73187769','POLLO ME GUSTA @ av piray del 3 al 4to anillo 62130050','POLLO CHRIS @ piray 74519550','POLLO ELVIS CAMACHO @ av prolong paraiso 60828876','POLLO DEYSI VARGAS DE ROCABADO 72639129','POLLO KROKITO 75399660 Monte alto calle 3','SALTEÑERIA MANANTIAL KM 15 68911334','JARDIN DE DONALD - CUCHILLA','JARDIN DE DONALD - TROMPILLO','JARDIN DE DONALD - CAÑOTO','JARDIN DE DONALD - 3P AL FRENTE','JARDIN DE DONALD @ - ABASTO','JARDIN DE DONALD - 4 NOVIEMBRE','POLLO KROSTY @ 2DO ANILLO','POLLO MAIRANEÑO 70811679','PATO VENTURA MARCO - 16de julio 70244083','ENRIQUE IBAÑEZ .@ - LA CUCHILLA-62162121','POLLO 4 DE NOVIEMBRE-76326988','JOSE IGNACIO WARNES VILLARRUEL @ 77380303','POLLO PICO PICON MOSCU -75364333','AGUSTIN ROMERO PIZA 76661673','POLLO MARIO MARTINEZ CONDO CHAPARRO 78026714','JERSY FABIOLA HURTADO OJEDA 77620111 (BR-CH)','ANGEL CONDARCO RIOS 63505028-67838541','MARIOLY YESSENIA SOLIZ ORTIZ 75508330','MARIA ROSA ZAMBRANA CLAROS 75512949','CARLA PAOLA SOLIZ ORTIZ  63598079','POLLO KROSTY @ 3RO ANILLO EXTERNO 74629739','ESTEFANNY JHASMIN QUISPE LOZA','OLGA LLANOS    MERCADO FORTALEZA','FAUSTINA TERRAZAS ORELLANA 62077566-69266826','NOEMI PADILLA IBAJA','PAULINA SILES CAYOLA 77338931','POLLO FABI  75572772','POLLOLANDIA 72116050-62116050','DIONICIA ARGANA DE VILLAN  62218000','JUAN CARLOS AGUILAR ARISPE 71675733','CARMEN ALICIA MENDEZ DEROMERIS 75618483','POLLO LA NEGRITA 75015412','POLLO KISY 71020418'];
        $codwilmarBraseros = ['102177','102181','102095','102153','102173','102202','102205','102267','102298','102339','102368','102406','102407','102408','102413','102443','102457','102479','102693','100002','100129','100395','100465','100805','100865','100990','101050','101059','101109','101145','101203','101281','101375','101499','101500','101549','101550','101551','101571','101572','101573','101574','101596','101604','101678','101706','101817','101826','101832','101850','101853','101854','101856','101869','101876','101880','101887','101907','101909','101914','101929','101951','101952','101955','101956','101957','101977','102072'];
        for ($i=0 ; $i< count($wilmarBraseros) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$wilmarBraseros[$i],
                'codcliente'=>$codwilmarBraseros[$i],
                'estado'=>'a',
                'idpromotor'=> 4,
                'idmercado'=> 39
            ]);
        };

        $wilmarNvaRamada = ['JOSE LUIS CORDOVA BARBA 73117747','AIDA MORALES -nva Ramada =Wilmar 79858302','YINA VASQUEZ FLORES -76617948','RIDER QUIROGA A. INDUSTRIAL- (CONCEPCION) 72690118'];
        $codwilmarNvaRamada = ['102178','102107','102174','101490'];
        for ($i=0 ; $i< count($wilmarNvaRamada) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$wilmarNvaRamada[$i],
                'codcliente'=>$codwilmarNvaRamada[$i],
                'estado'=>'a',
                'idpromotor'=> 4,
                'idmercado'=> 28
            ]);
        };

        $wilmarNvoAbasto = ['CONSTANCIA FLOREZ HINOJOSA 71356495','ERIKA YANINE CESPEDEZ n/ abasto','GABRIELA GALEAN n/abasto 79094309','OMAR MIRANDA nuevo abasto 60099887','ERIKA ROCABADO n/abasto','SANDOSA AMADOR GALLARDO n/abasto 70903626','IRINA MARIOLY ANTELO VARGAS n/abasto 76655288','VIRGINIA PEREZ VASQUEZ 78044686','MARISABEL VIDAL GARCIA EX-E.MORON','GERARDO CALSADILLA','BENITO PALERMO -NV ABASTO 61326291','TITO SEGOVIA - N. ABASTO  6-78044686','SDENKA VALDA VARGAS- NV ABASTO 62139035','EVANGELINA RODRIGUEZ FERNANDEZ 75655129','KENNY PINTO MIRANDA 69011744','MARIBEL OLLISCO CHOQUE -NV.ABASTO 76065685','MARIA ELENA VIRUEZ -MERCADO NV ABASTO 69169886'];
        $codwilmarNvoAbasto = ['102122','100708','100714','100757','100870','100916','101183','101310','101371','101401','101457','101666','101867','101877','101922','102011','102016'];
        for ($i=0 ; $i< count($wilmarNvoAbasto) ; $i++){
            DB::table('clientes')->insert([
                'nombrecliente'=>$wilmarNvoAbasto[$i],
                'codcliente'=>$codwilmarNvoAbasto[$i],
                'estado'=>'a',
                'idpromotor'=> 4,
                'idmercado'=> 29
            ]);
        };

    }
}
