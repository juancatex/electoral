<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Destinos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $des='{
            "des": [
                  {
                            "iddestino" : 1,
                            "idfuerza" : 3,
                            "coddestino" : "000000",
                            "nomdestino" : "No Identificado",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 2,
                            "idfuerza" : 3,
                            "coddestino" : "000010",
                            "nomdestino" : "CASA MILITAR S.E.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 3,
                            "idfuerza" : 3,
                            "coddestino" : "000100",
                            "nomdestino" : "MINISTERIO DEFENSA",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 4,
                            "idfuerza" : 3,
                            "coddestino" : "000500",
                            "nomdestino" : "TRIB.SUP.JUST.MIL.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 5,
                            "idfuerza" : 3,
                            "coddestino" : "000510",
                            "nomdestino" : "TRIB.PERM.JUST.MIL.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 6,
                            "idfuerza" : 3,
                            "coddestino" : "000700",
                            "nomdestino" : "REGION MIL. #1 LP",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 7,
                            "idfuerza" : 3,
                            "coddestino" : "000750",
                            "nomdestino" : "REGION MIL. #2 OR",
                            "idmunicipio" : 164,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 8,
                            "idfuerza" : 3,
                            "coddestino" : "000800",
                            "nomdestino" : "REGION MIL. #3 TJ",
                            "idmunicipio" : 239,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 9,
                            "idfuerza" : 3,
                            "coddestino" : "000850",
                            "nomdestino" : "REGION MIL. #4 SU",
                            "idmunicipio" : 1,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 10,
                            "idfuerza" : 3,
                            "coddestino" : "001150",
                            "nomdestino" : "COSSMIL LP",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 11,
                            "idfuerza" : 3,
                            "coddestino" : "001300",
                            "nomdestino" : "HOSPITAL MILITAR CENTRAL",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 12,
                            "idfuerza" : 3,
                            "coddestino" : "001750",
                            "nomdestino" : "COMANDO EN JEFE DE LAS FF.AA.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 13,
                            "idfuerza" : 3,
                            "coddestino" : "002100",
                            "nomdestino" : "ESC.MIL.INGENIERIA",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 14,
                            "idfuerza" : 3,
                            "coddestino" : "002250",
                            "nomdestino" : "COMANDO GRAL.EJTO.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 15,
                            "idfuerza" : 3,
                            "coddestino" : "003050",
                            "nomdestino" : "PROM.PROF.EJTO.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 16,
                            "idfuerza" : 3,
                            "coddestino" : "003100",
                            "nomdestino" : "CENT.GRAL.MANTENIM.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 17,
                            "idfuerza" : 3,
                            "coddestino" : "003200",
                            "nomdestino" : "INST.GEOGRAF.MIL.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 18,
                            "idfuerza" : 3,
                            "coddestino" : "003205",
                            "nomdestino" : "ESC.MIL.TOPOGRAFIA EJTO.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 19,
                            "idfuerza" : 3,
                            "coddestino" : "003300",
                            "nomdestino" : "RI-1 COLORADOS",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 20,
                            "idfuerza" : 3,
                            "coddestino" : "003350",
                            "nomdestino" : "RCB-4 \"INGAVI\"",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 21,
                            "idfuerza" : 3,
                            "coddestino" : "003400",
                            "nomdestino" : "BPM.B-I \"SAAVEDRA\"",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 22,
                            "idfuerza" : 3,
                            "coddestino" : "003450",
                            "nomdestino" : "BAT.Y ESC.COM.1 \"VIDAURRE\"",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 23,
                            "idfuerza" : 3,
                            "coddestino" : "003500",
                            "nomdestino" : "RCB-2 \"TARAPACA\"",
                            "idmunicipio" : 41,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 24,
                            "idfuerza" : 3,
                            "coddestino" : "003550",
                            "nomdestino" : "RCB-1 \"CALAMA\"",
                            "idmunicipio" : 98,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 25,
                            "idfuerza" : 3,
                            "coddestino" : "003600",
                            "nomdestino" : "RAA-6 \"BILBAO RIOJA\"",
                            "idmunicipio" : 67,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 26,
                            "idfuerza" : 3,
                            "coddestino" : "003650",
                            "nomdestino" : "COMP.AVIACION.EJTO.1 \"LOPEZ\"",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 27,
                            "idfuerza" : 3,
                            "coddestino" : "003700",
                            "nomdestino" : "CMDO.1RA.DIV.BLINDADA",
                            "idmunicipio" : 325,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 28,
                            "idfuerza" : 3,
                            "coddestino" : "003710",
                            "nomdestino" : "PRIMERA BRIGADA MECANIZADA",
                            "idmunicipio" : 67,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 29,
                            "idfuerza" : 3,
                            "coddestino" : "003750",
                            "nomdestino" : "RIB-8 \"AYACUCHO\"",
                            "idmunicipio" : 35,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 30,
                            "idfuerza" : 3,
                            "coddestino" : "003800",
                            "nomdestino" : "RIB-23 \"MAX TOLEDO\"",
                            "idmunicipio" : 67,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 31,
                            "idfuerza" : 3,
                            "coddestino" : "003850",
                            "nomdestino" : "RCB-5 \"LANZA\"",
                            "idmunicipio" : 68,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 32,
                            "idfuerza" : 3,
                            "coddestino" : "003900",
                            "nomdestino" : "RA-2 \"BOLIVAR\"",
                            "idmunicipio" : 164,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 33,
                            "idfuerza" : 3,
                            "coddestino" : "003950",
                            "nomdestino" : "BAT.ING.II \"ROMAN\"",
                            "idmunicipio" : 115,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 34,
                            "idfuerza" : 3,
                            "coddestino" : "004000",
                            "nomdestino" : "CMDO.2DA.DIVI.",
                            "idmunicipio" : 164,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 35,
                            "idfuerza" : 3,
                            "coddestino" : "004050",
                            "nomdestino" : "RADIO BAT.TOPATER",
                            "idmunicipio" : 164,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 36,
                            "idfuerza" : 3,
                            "coddestino" : "004100",
                            "nomdestino" : "RI-21 \"ILLIMANI\"",
                            "idmunicipio" : 203,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 37,
                            "idfuerza" : 3,
                            "coddestino" : "004150",
                            "nomdestino" : "RI-22 \"MEJILLONES\"",
                            "idmunicipio" : 174,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 38,
                            "idfuerza" : 3,
                            "coddestino" : "004200",
                            "nomdestino" : "REG.FF.EE. 24 MENDEZ ARCOS",
                            "idmunicipio" : 168,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 39,
                            "idfuerza" : 3,
                            "coddestino" : "004250",
                            "nomdestino" : "REG.Y ESC.AND.25 \"TOCOPILLA\"",
                            "idmunicipio" : 172,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 40,
                            "idfuerza" : 3,
                            "coddestino" : "004300",
                            "nomdestino" : "RC-8 \"BRAUN\"",
                            "idmunicipio" : 141,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 41,
                            "idfuerza" : 3,
                            "coddestino" : "004350",
                            "nomdestino" : "RA-1 \"CAMACHO\"",
                            "idmunicipio" : 164,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 42,
                            "idfuerza" : 3,
                            "coddestino" : "004400",
                            "nomdestino" : "BAT.ING.VII \"SAJAMA\"",
                            "idmunicipio" : 170,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 43,
                            "idfuerza" : 3,
                            "coddestino" : "004450",
                            "nomdestino" : "CMDO.3RA.DIV.",
                            "idmunicipio" : 244,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 44,
                            "idfuerza" : 3,
                            "coddestino" : "004500",
                            "nomdestino" : "RI-5 \"CAMPERO\"",
                            "idmunicipio" : 244,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 45,
                            "idfuerza" : 3,
                            "coddestino" : "004550",
                            "nomdestino" : "RI-20 \"PADILLA\"",
                            "idmunicipio" : 239,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 46,
                            "idfuerza" : 3,
                            "coddestino" : "004600",
                            "nomdestino" : "RC-3 \"AROMA\"",
                            "idmunicipio" : 242,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 47,
                            "idfuerza" : 3,
                            "coddestino" : "004650",
                            "nomdestino" : "RA-3 \"PISAGUA\"",
                            "idmunicipio" : 244,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 48,
                            "idfuerza" : 3,
                            "coddestino" : "004700",
                            "nomdestino" : "BAT.ING.-I CHOROLQUE",
                            "idmunicipio" : 239,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 49,
                            "idfuerza" : 3,
                            "coddestino" : "004750",
                            "nomdestino" : "CMDO.4TA.DIV.",
                            "idmunicipio" : 275,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 50,
                            "idfuerza" : 3,
                            "coddestino" : "004800",
                            "nomdestino" : "RI-6 \"CAMPOS\"",
                            "idmunicipio" : 276,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 51,
                            "idfuerza" : 3,
                            "coddestino" : "004850",
                            "nomdestino" : "RI-11 \"BOQUERON\"",
                            "idmunicipio" : 271,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 52,
                            "idfuerza" : 3,
                            "coddestino" : "004900",
                            "nomdestino" : "RC-1 \"AVAROA\"",
                            "idmunicipio" : 275,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 53,
                            "idfuerza" : 3,
                            "coddestino" : "004950",
                            "nomdestino" : "RA-4 \"BULLAIN\"",
                            "idmunicipio" : 273,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 54,
                            "idfuerza" : 3,
                            "coddestino" : "005000",
                            "nomdestino" : "CMDO.5TA.DIV.",
                            "idmunicipio" : 266,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 55,
                            "idfuerza" : 3,
                            "coddestino" : "005050",
                            "nomdestino" : "RI-13 \"ISMAEL MONTES\"",
                            "idmunicipio" : 264,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 56,
                            "idfuerza" : 3,
                            "coddestino" : "005100",
                            "nomdestino" : "RI-14 \"FLORIDA\"",
                            "idmunicipio" : 297,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 57,
                            "idfuerza" : 3,
                            "coddestino" : "005150",
                            "nomdestino" : "RI-15 \"JUNIN\"",
                            "idmunicipio" : 266,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 58,
                            "idfuerza" : 3,
                            "coddestino" : "005200",
                            "nomdestino" : "RC-6 \"CASTRILLO\"",
                            "idmunicipio" : 300,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 59,
                            "idfuerza" : 3,
                            "coddestino" : "005250",
                            "nomdestino" : "RA-5 \"VERGARA\"",
                            "idmunicipio" : 266,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 60,
                            "idfuerza" : 3,
                            "coddestino" : "005300",
                            "nomdestino" : "CMDO.6TA.DIV.",
                            "idmunicipio" : 239,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 61,
                            "idfuerza" : 3,
                            "coddestino" : "005350",
                            "nomdestino" : "RI-29 \"CAP.LINO ECHEVERRIA\"",
                            "idmunicipio" : 306,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 62,
                            "idfuerza" : 3,
                            "coddestino" : "005420",
                            "nomdestino" : "RI-35 \"BRUNO RACUA\"",
                            "idmunicipio" : 329,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 63,
                            "idfuerza" : 3,
                            "coddestino" : "005450",
                            "nomdestino" : "REG.Y ESC.SELVA FF.EE. 16 JORDAN",
                            "idmunicipio" : 308,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 64,
                            "idfuerza" : 3,
                            "coddestino" : "005500",
                            "nomdestino" : "RI-17 \"INDEPENDENCIA\"",
                            "idmunicipio" : 309,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 65,
                            "idfuerza" : 3,
                            "coddestino" : "005550",
                            "nomdestino" : "RC-2 \"BALLIVIAN\"",
                            "idmunicipio" : 319,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 66,
                            "idfuerza" : 3,
                            "coddestino" : "005600",
                            "nomdestino" : "CMDO.7MA.DIV.",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 67,
                            "idfuerza" : 3,
                            "coddestino" : "005750",
                            "nomdestino" : "BAT.DE TRANSPORTES III",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 68,
                            "idfuerza" : 3,
                            "coddestino" : "005800",
                            "nomdestino" : "BAT.PM-III \"ESTEBAN ARCE\"",
                            "idmunicipio" : 138,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 69,
                            "idfuerza" : 3,
                            "coddestino" : "005850",
                            "nomdestino" : "RI-2 \"SUCRE\"",
                            "idmunicipio" : 1,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 70,
                            "idfuerza" : 3,
                            "coddestino" : "005900",
                            "nomdestino" : "REG.Y ESC.PARACAID.18 \"VICTORIA\"",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 71,
                            "idfuerza" : 3,
                            "coddestino" : "006000",
                            "nomdestino" : "RI-26 \"GRAL.BARRIENTOS\"",
                            "idmunicipio" : 144,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 72,
                            "idfuerza" : 3,
                            "coddestino" : "006050",
                            "nomdestino" : "RI-31 \"CNL.EPIFANIO RIOS\"",
                            "idmunicipio" : 145,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 73,
                            "idfuerza" : 3,
                            "coddestino" : "006100",
                            "nomdestino" : "RA-7 \"TUMUSLA\"",
                            "idmunicipio" : 138,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 74,
                            "idfuerza" : 3,
                            "coddestino" : "006300",
                            "nomdestino" : "BAT.ING.-V OVANDO",
                            "idmunicipio" : 1,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 75,
                            "idfuerza" : 3,
                            "coddestino" : "006350",
                            "nomdestino" : "ARSENAL CENTRAL",
                            "idmunicipio" : 1,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 76,
                            "idfuerza" : 3,
                            "coddestino" : "006352",
                            "nomdestino" : "FUERZA DE TAREA CONJUNTA",
                            "idmunicipio" : 1,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 77,
                            "idfuerza" : 3,
                            "coddestino" : "006353",
                            "nomdestino" : "GRUPO CABALL.AER.\"GRAL.A.SANTIAGO\"",
                            "idmunicipio" : 150,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 78,
                            "idfuerza" : 3,
                            "coddestino" : "006356",
                            "nomdestino" : "CMDO.9NA.DIVISION",
                            "idmunicipio" : 145,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 79,
                            "idfuerza" : 3,
                            "coddestino" : "006358",
                            "nomdestino" : "RI-32 \"IDELFONSO MURGUIA\"",
                            "idmunicipio" : 150,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 80,
                            "idfuerza" : 3,
                            "coddestino" : "006360",
                            "nomdestino" : "RI-33 \"LADISLAO CABRERA\"",
                            "idmunicipio" : 152,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 81,
                            "idfuerza" : 3,
                            "coddestino" : "006400",
                            "nomdestino" : "CMDO.8VA.DIV.",
                            "idmunicipio" : 250,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 82,
                            "idfuerza" : 3,
                            "coddestino" : "006500",
                            "nomdestino" : "BAT.DE TRANSPORTES II",
                            "idmunicipio" : 250,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 83,
                            "idfuerza" : 3,
                            "coddestino" : "006550",
                            "nomdestino" : "BAT.PM-II \"AMEZAGA\"",
                            "idmunicipio" : 250,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 84,
                            "idfuerza" : 3,
                            "coddestino" : "006600",
                            "nomdestino" : "RI-7 \"MARZANA\"",
                            "idmunicipio" : 272,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 85,
                            "idfuerza" : 3,
                            "coddestino" : "006750",
                            "nomdestino" : "RI-10 \"WARNES\"",
                            "idmunicipio" : 257,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 86,
                            "idfuerza" : 3,
                            "coddestino" : "006800",
                            "nomdestino" : "REG.FF.EE. 12 MANCHEGO",
                            "idmunicipio" : 286,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 87,
                            "idfuerza" : 3,
                            "coddestino" : "006850",
                            "nomdestino" : "BAT.ING.-III PANDO",
                            "idmunicipio" : 266,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 88,
                            "idfuerza" : 3,
                            "coddestino" : "006900",
                            "nomdestino" : "BAT.PROD.Y ECOLOGICO III",
                            "idmunicipio" : 286,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 89,
                            "idfuerza" : 3,
                            "coddestino" : "006910",
                            "nomdestino" : "RA. 8 \"SANTA CRUZ\" STA.ROSA POQUIO",
                            "idmunicipio" : 250,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 90,
                            "idfuerza" : 3,
                            "coddestino" : "006920",
                            "nomdestino" : "RC. 10 \"CNL.JOSE MANUEL MERCADO\"",
                            "idmunicipio" : 260,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 91,
                            "idfuerza" : 3,
                            "coddestino" : "006950",
                            "nomdestino" : "BAT.PROD.Y ECOLOGICO II",
                            "idmunicipio" : 310,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 92,
                            "idfuerza" : 3,
                            "coddestino" : "007000",
                            "nomdestino" : "RI-30 \"MURILLO\"",
                            "idmunicipio" : 65,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 93,
                            "idfuerza" : 3,
                            "coddestino" : "007050",
                            "nomdestino" : "BAT.ING.-VI RIOSINHO",
                            "idmunicipio" : 325,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 94,
                            "idfuerza" : 3,
                            "coddestino" : "007060",
                            "nomdestino" : "BAT.POL.MIL.IV \"SLDO RODOLFO SILES\"",
                            "idmunicipio" : 325,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 95,
                            "idfuerza" : 3,
                            "coddestino" : "007100",
                            "nomdestino" : "CMDO.10MA.DIV.",
                            "idmunicipio" : 220,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 96,
                            "idfuerza" : 3,
                            "coddestino" : "007150",
                            "nomdestino" : "RI-3 \"PEREZ\"",
                            "idmunicipio" : 199,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 97,
                            "idfuerza" : 3,
                            "coddestino" : "007200",
                            "nomdestino" : "RI-4 \"LOA\"",
                            "idmunicipio" : 230,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 98,
                            "idfuerza" : 3,
                            "coddestino" : "007250",
                            "nomdestino" : "RI-27 \"ANTOFAGASTA\"",
                            "idmunicipio" : 222,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 99,
                            "idfuerza" : 3,
                            "coddestino" : "007300",
                            "nomdestino" : "RC-7 \"CHICHAS\"",
                            "idmunicipio" : 220,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 100,
                            "idfuerza" : 3,
                            "coddestino" : "007350",
                            "nomdestino" : "E.C.E.M. MCAL.S.CRUZ",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 101,
                            "idfuerza" : 3,
                            "coddestino" : "007400",
                            "nomdestino" : "ESC.DE APLICACION DE ARMAS",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 102,
                            "idfuerza" : 3,
                            "coddestino" : "007550",
                            "nomdestino" : "ESC.MIL.INTELIGENCIA",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 103,
                            "idfuerza" : 3,
                            "coddestino" : "007600",
                            "nomdestino" : "COLEG.MILITAR EJTO.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 104,
                            "idfuerza" : 3,
                            "coddestino" : "007650",
                            "nomdestino" : "EMSE.MAX PAREDES",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 105,
                            "idfuerza" : 3,
                            "coddestino" : "007750",
                            "nomdestino" : "ESC.CONDORES BOL.",
                            "idmunicipio" : 242,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 106,
                            "idfuerza" : 3,
                            "coddestino" : "007800",
                            "nomdestino" : "LICEO MIL. ANDRADE",
                            "idmunicipio" : 1,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 107,
                            "idfuerza" : 3,
                            "coddestino" : "007850",
                            "nomdestino" : "ESC.MIL.MUSICA",
                            "idmunicipio" : 67,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 108,
                            "idfuerza" : 4,
                            "coddestino" : "009020",
                            "nomdestino" : "CENTRO AGROP.#1 \"CARANAVI\"",
                            "idmunicipio" : 10,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 109,
                            "idfuerza" : 4,
                            "coddestino" : "009030",
                            "nomdestino" : "COMANDO GENERAL DE LA FUERZA AEREA",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 110,
                            "idfuerza" : 4,
                            "coddestino" : "009040",
                            "nomdestino" : "ESC.GUERRA AEREA GRAL.BARRIENTOS",
                            "idmunicipio" : 1,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 111,
                            "idfuerza" : 4,
                            "coddestino" : "009060",
                            "nomdestino" : "SERVICIO NACIONAL DE AEROFOT.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 112,
                            "idfuerza" : 4,
                            "coddestino" : "009120",
                            "nomdestino" : "I-BRIGADA AEREA",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 113,
                            "idfuerza" : 4,
                            "coddestino" : "009200",
                            "nomdestino" : "GRUPO AEREO DE CAZA 31",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 114,
                            "idfuerza" : 4,
                            "coddestino" : "009220",
                            "nomdestino" : "GRUPO AEREO DE TRANSPORTE 71",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 115,
                            "idfuerza" : 4,
                            "coddestino" : "009240",
                            "nomdestino" : "AGEN.TAM-TAB LOCALES",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 116,
                            "idfuerza" : 4,
                            "coddestino" : "009280",
                            "nomdestino" : "GRUPO DE ART.DEF.ANTIAEREA 91",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 117,
                            "idfuerza" : 4,
                            "coddestino" : "009320",
                            "nomdestino" : "SERV.DE ABASTECIMIENTO AEREO 11",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 118,
                            "idfuerza" : 4,
                            "coddestino" : "009380",
                            "nomdestino" : "III-BRIGADA AEREA",
                            "idmunicipio" : 250,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 119,
                            "idfuerza" : 4,
                            "coddestino" : "009400",
                            "nomdestino" : "GRUPO.AEREO DE ENTRENAMIENTO 21",
                            "idmunicipio" : 150,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 120,
                            "idfuerza" : 4,
                            "coddestino" : "009460",
                            "nomdestino" : "GRUPO DE ARTILL.Y DEF.ANTIAEREA 93",
                            "idmunicipio" : 250,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 121,
                            "idfuerza" : 4,
                            "coddestino" : "009540",
                            "nomdestino" : "COLEGIO MILITAR DE AVIACION",
                            "idmunicipio" : 250,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 122,
                            "idfuerza" : 4,
                            "coddestino" : "009580",
                            "nomdestino" : "II-BRIGADA AEREA",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 123,
                            "idfuerza" : 4,
                            "coddestino" : "009600",
                            "nomdestino" : "GRUPO DE ART.Y DEF.ANTIAEREA 92",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 124,
                            "idfuerza" : 4,
                            "coddestino" : "009640",
                            "nomdestino" : "GRUPO AEREO DE CAZA 34",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 125,
                            "idfuerza" : 4,
                            "coddestino" : "009660",
                            "nomdestino" : "GRUPO AEREO BUSQ.Y SALVAMENTO 51",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 126,
                            "idfuerza" : 4,
                            "coddestino" : "009690",
                            "nomdestino" : "SERVICIO MANTTO. AEREO CBBA.",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 127,
                            "idfuerza" : 4,
                            "coddestino" : "009700",
                            "nomdestino" : "POLITECNICO MILITAR DE AERONAUTICA",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 128,
                            "idfuerza" : 4,
                            "coddestino" : "009740",
                            "nomdestino" : "IV-BRIGADA AEREA",
                            "idmunicipio" : 239,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 129,
                            "idfuerza" : 4,
                            "coddestino" : "009780",
                            "nomdestino" : "GRUPO DE ART.Y DEF. ANTIAEREA 94",
                            "idmunicipio" : 244,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 130,
                            "idfuerza" : 4,
                            "coddestino" : "009860",
                            "nomdestino" : "GRUPO AEREO DE EXPLOR.Y RECON. 83",
                            "idmunicipio" : 300,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 131,
                            "idfuerza" : 4,
                            "coddestino" : "009900",
                            "nomdestino" : "GRUPO AEREO TACTICO 63",
                            "idmunicipio" : 244,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 132,
                            "idfuerza" : 4,
                            "coddestino" : "009940",
                            "nomdestino" : "GRUPO AEREO TACTICO 61",
                            "idmunicipio" : 266,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 133,
                            "idfuerza" : 4,
                            "coddestino" : "010000",
                            "nomdestino" : "GRUPO AEREO DE TRANSPORTE 72",
                            "idmunicipio" : 306,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 134,
                            "idfuerza" : 4,
                            "coddestino" : "010060",
                            "nomdestino" : "GRUPO AEREO TACTICO 62",
                            "idmunicipio" : 308,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 135,
                            "idfuerza" : 4,
                            "coddestino" : "010120",
                            "nomdestino" : "GRUPO AEREO TACTICO 64",
                            "idmunicipio" : 325,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 136,
                            "idfuerza" : 5,
                            "coddestino" : "020000",
                            "nomdestino" : "CMDO.GRAL.ARMADA BOLIVIANA",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 137,
                            "idfuerza" : 5,
                            "coddestino" : "020220",
                            "nomdestino" : "HIDROGRAFIA NAVAL",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 138,
                            "idfuerza" : 5,
                            "coddestino" : "020240",
                            "nomdestino" : "I-DIST. NAVAL BENI",
                            "idmunicipio" : 308,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 139,
                            "idfuerza" : 5,
                            "coddestino" : "020300",
                            "nomdestino" : "BASE NAVAL \"BALLIVIAN\"",
                            "idmunicipio" : 313,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 140,
                            "idfuerza" : 5,
                            "coddestino" : "020320",
                            "nomdestino" : "II-DIST.NAVAL MAMORE",
                            "idmunicipio" : 319,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 141,
                            "idfuerza" : 5,
                            "coddestino" : "020380",
                            "nomdestino" : "B.N.PTO.VILLARROEL",
                            "idmunicipio" : 151,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 142,
                            "idfuerza" : 5,
                            "coddestino" : "020382",
                            "nomdestino" : "AREA NAVAL # 1 \"COCHABAMBA\"",
                            "idmunicipio" : 117,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 143,
                            "idfuerza" : 5,
                            "coddestino" : "020383",
                            "nomdestino" : "AREA NAVAL # 2 \"SANTA CRUZ\"",
                            "idmunicipio" : 250,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 144,
                            "idfuerza" : 5,
                            "coddestino" : "020390",
                            "nomdestino" : "AREA NAVAL # 3 \"BERMEJO\"",
                            "idmunicipio" : 241,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 145,
                            "idfuerza" : 5,
                            "coddestino" : "020420",
                            "nomdestino" : "III-DIST.NAV.MADERA",
                            "idmunicipio" : 309,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 146,
                            "idfuerza" : 5,
                            "coddestino" : "020520",
                            "nomdestino" : "IV-DIST.NAV.TITICACA",
                            "idmunicipio" : 108,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 147,
                            "idfuerza" : 5,
                            "coddestino" : "020600",
                            "nomdestino" : "V-DIST.NAV.DEL PLATA",
                            "idmunicipio" : 301,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 148,
                            "idfuerza" : 5,
                            "coddestino" : "020660",
                            "nomdestino" : "VI-DIST.NAV.DEL ACRE",
                            "idmunicipio" : 325,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 149,
                            "idfuerza" : 5,
                            "coddestino" : "020780",
                            "nomdestino" : "ESC.GUERRA NAVAL",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 150,
                            "idfuerza" : 5,
                            "coddestino" : "020800",
                            "nomdestino" : "ESCUELA NAVAL MIL.",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 151,
                            "idfuerza" : 5,
                            "coddestino" : "020820",
                            "nomdestino" : "ESC. SGTO.ZEBALLOS",
                            "idmunicipio" : 308,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 152,
                            "idfuerza" : 3,
                            "coddestino" : "030000",
                            "nomdestino" : "SERVICIO DIPLOMATICO",
                            "idmunicipio" : 30,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 153,
                            "idfuerza" : 5,
                            "coddestino" : "999900",
                            "nomdestino" : "II-DIST.MAMORE",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 154,
                            "idfuerza" : 5,
                            "coddestino" : "999910",
                            "nomdestino" : "II-DIST.MAMORE",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 155,
                            "idfuerza" : 5,
                            "coddestino" : "999919",
                            "nomdestino" : "AREA NAV.1 CBB",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 156,
                            "idfuerza" : 5,
                            "coddestino" : "999916",
                            "nomdestino" : "CMDO.ARM.BOL",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 157,
                            "idfuerza" : 5,
                            "coddestino" : "999912",
                            "nomdestino" : "CMDO.ARM.BOL",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 158,
                            "idfuerza" : 5,
                            "coddestino" : "999921",
                            "nomdestino" : "CMDO.ARM.BOL",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 159,
                            "idfuerza" : 4,
                            "coddestino" : "009260",
                            "nomdestino" : "AG.TAM.TAB.FRO",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 160,
                            "idfuerza" : 4,
                            "coddestino" : "009160",
                            "nomdestino" : "ESC.ESP.PRO.AE",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 161,
                            "idfuerza" : 4,
                            "coddestino" : "009340",
                            "nomdestino" : "SERV.INFR.AER.",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 162,
                            "idfuerza" : 4,
                            "coddestino" : "999914",
                            "nomdestino" : "I-BRIG.AEREA",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 163,
                            "idfuerza" : 4,
                            "coddestino" : "009010",
                            "nomdestino" : "DIR.GRAL.B.SOC",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 164,
                            "idfuerza" : 4,
                            "coddestino" : "009000",
                            "nomdestino" : "SUB.STRIA.AER.",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 165,
                            "idfuerza" : 3,
                            "coddestino" : "002050",
                            "nomdestino" : "E.A.E.N. LP.",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 166,
                            "idfuerza" : 3,
                            "coddestino" : "001600",
                            "nomdestino" : "COFADENA LP",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 167,
                            "idfuerza" : 3,
                            "coddestino" : "999911",
                            "nomdestino" : "RA-4 \"BULLAIN\"",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 168,
                            "idfuerza" : 3,
                            "coddestino" : "999918",
                            "nomdestino" : "RC-8 \"BRAUN\"",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 169,
                            "idfuerza" : 3,
                            "coddestino" : "001400",
                            "nomdestino" : "HO.MIL.#2 SC",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 170,
                            "idfuerza" : 5,
                            "coddestino" : "000100",
                            "nomdestino" : "MINDEFENSA",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 171,
                            "idfuerza" : 5,
                            "coddestino" : "000510",
                            "nomdestino" : "TRIB.PER.JUS.M",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 172,
                            "idfuerza" : 5,
                            "coddestino" : "001750",
                            "nomdestino" : "CMDO.EN JEFE FA",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 173,
                            "idfuerza" : 5,
                            "coddestino" : "999918",
                            "nomdestino" : "CMDO.ARM.BOL",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 174,
                            "idfuerza" : 5,
                            "coddestino" : "999914",
                            "nomdestino" : "CMDO.ARM.BOL",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 175,
                            "idfuerza" : 5,
                            "coddestino" : "000500",
                            "nomdestino" : "TRIB.SUP.JUS.M",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 176,
                            "idfuerza" : 4,
                            "coddestino" : "999910",
                            "nomdestino" : "G.A.TACTICO 64",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 177,
                            "idfuerza" : 4,
                            "coddestino" : "999900",
                            "nomdestino" : "G.A.TACTICO 64",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 178,
                            "idfuerza" : 4,
                            "coddestino" : "009520",
                            "nomdestino" : "FZA.DE TAREA",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 179,
                            "idfuerza" : 4,
                            "coddestino" : "009360",
                            "nomdestino" : "DPTO.III SAN.AE",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 180,
                            "idfuerza" : 4,
                            "coddestino" : "999919",
                            "nomdestino" : "POL.MIL.AER.",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 181,
                            "idfuerza" : 4,
                            "coddestino" : "999916",
                            "nomdestino" : "I-BRIG.AEREA",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 182,
                            "idfuerza" : 3,
                            "coddestino" : "999900",
                            "nomdestino" : "CMDO.7MA.DIV.",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 183,
                            "idfuerza" : 3,
                            "coddestino" : "999910",
                            "nomdestino" : "CMDO.7MA.DIV.",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 184,
                            "idfuerza" : 3,
                            "coddestino" : "999916",
                            "nomdestino" : "RC.10 J.MERCADO",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 185,
                            "idfuerza" : 3,
                            "coddestino" : "999912",
                            "nomdestino" : "COMANEJTO. LP.",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 186,
                            "idfuerza" : 3,
                            "coddestino" : "999921",
                            "nomdestino" : "RI-2 \"SUCRE\"",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 187,
                            "idfuerza" : 3,
                            "coddestino" : "999914",
                            "nomdestino" : "COMANEJTO. LP.",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 188,
                            "idfuerza" : 3,
                            "coddestino" : "002600",
                            "nomdestino" : "ESC.DE IDIOMAS",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 189,
                            "idfuerza" : 3,
                            "coddestino" : "999919",
                            "nomdestino" : "CMDO.7MA.DIV.",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 190,
                            "idfuerza" : 3,
                            "coddestino" : "002000",
                            "nomdestino" : "E.A.E.N. CBBA.",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 191,
                            "idfuerza" : 3,
                            "coddestino" : "001200",
                            "nomdestino" : "COSSMIL.CBBA",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 192,
                            "idfuerza" : 3,
                            "coddestino" : "001100",
                            "nomdestino" : "REG.MIL.#10 PT",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 193,
                            "idfuerza" : 3,
                            "coddestino" : "002040",
                            "nomdestino" : "E.A.E.N S.CRUZ",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 194,
                            "idfuerza" : 3,
                            "coddestino" : "001050",
                            "nomdestino" : "REG.MIL#8 SC",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 195,
                            "idfuerza" : 4,
                            "coddestino" : "000000",
                            "nomdestino" : "No Identificado",
                            "idmunicipio" : null,
                            "activo" : 1
                        },
                        {
                            "iddestino" : 196,
                            "idfuerza" : 5,
                            "coddestino" : "000000",
                            "nomdestino" : "No Identificado",
                            "idmunicipio" : null,
                            "activo" : 1
                        }
                    ]} ';
            $destino = json_decode($des, true);

            foreach($destino['des'] as $de)
            {
         DB::table('par__destinos')->insert(['iddestino'=>$de['iddestino'],'idfuerza'=>$de['idfuerza'],'coddestino'=>$de['coddestino'],'nomdestino'=>$de['nomdestino']]);  
            }
      
    }
}
