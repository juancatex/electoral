<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Especialidades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $espe='  
            {
                "especialidades": [
                    {
                        "idespecialidad" : 1,
                        "idfuerza" : 3,
                        "nomespecialidad" : "",
                        "abrvesp" : "-",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 2,
                        "idfuerza" : 3,
                        "nomespecialidad" : "ING.",
                        "abrvesp" : "ING.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 3,
                        "idfuerza" : 3,
                        "nomespecialidad" : "MOT.",
                        "abrvesp" : "MOT.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 4,
                        "idfuerza" : 3,
                        "nomespecialidad" : "INTEND.",
                        "abrvesp" : "INTEND.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 5,
                        "idfuerza" : 3,
                        "nomespecialidad" : "CAB.",
                        "abrvesp" : "CAB.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 6,
                        "idfuerza" : 3,
                        "nomespecialidad" : ".",
                        "abrvesp" : ".",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 7,
                        "idfuerza" : 3,
                        "nomespecialidad" : "INF.",
                        "abrvesp" : "INF.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 8,
                        "idfuerza" : 3,
                        "nomespecialidad" : "ART.",
                        "abrvesp" : "ART.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 9,
                        "idfuerza" : 3,
                        "nomespecialidad" : "COM.",
                        "abrvesp" : "COM.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 10,
                        "idfuerza" : 3,
                        "nomespecialidad" : "TEC.",
                        "abrvesp" : "TEC.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 11,
                        "idfuerza" : 3,
                        "nomespecialidad" : "TOP.",
                        "abrvesp" : "TOP.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 12,
                        "idfuerza" : 3,
                        "nomespecialidad" : "MUS.",
                        "abrvesp" : "MUS.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 13,
                        "idfuerza" : 3,
                        "nomespecialidad" : "R.OPR.",
                        "abrvesp" : "R.OPR.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 14,
                        "idfuerza" : 3,
                        "nomespecialidad" : "SAN.",
                        "abrvesp" : "SAN.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 15,
                        "idfuerza" : 3,
                        "nomespecialidad" : "STA.",
                        "abrvesp" : "STA.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 16,
                        "idfuerza" : 3,
                        "nomespecialidad" : "MUS.NO EGR*",
                        "abrvesp" : "MUS.NO EGR*",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 17,
                        "idfuerza" : 3,
                        "nomespecialidad" : "MB.",
                        "abrvesp" : "MB.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 18,
                        "idfuerza" : 3,
                        "nomespecialidad" : "MEC.ARM.",
                        "abrvesp" : "MEC.ARM.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 19,
                        "idfuerza" : 3,
                        "nomespecialidad" : "MANT.",
                        "abrvesp" : "MANT.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 20,
                        "idfuerza" : 3,
                        "nomespecialidad" : "AGRON.",
                        "abrvesp" : "AGRON.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 21,
                        "idfuerza" : 3,
                        "nomespecialidad" : "MEC.AV.",
                        "abrvesp" : "MEC.AV.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 22,
                        "idfuerza" : 3,
                        "nomespecialidad" : "VIT.",
                        "abrvesp" : "VIT.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 23,
                        "idfuerza" : 3,
                        "nomespecialidad" : "AV.",
                        "abrvesp" : "AV.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 24,
                        "idfuerza" : 3,
                        "nomespecialidad" : "TEC.AV.",
                        "abrvesp" : "TEC.AV.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 25,
                        "idfuerza" : 3,
                        "nomespecialidad" : "PROG.SIS.",
                        "abrvesp" : "PROG.SIS.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 26,
                        "idfuerza" : 3,
                        "nomespecialidad" : "COMPUT.",
                        "abrvesp" : "COMPUT.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 27,
                        "idfuerza" : 4,
                        "nomespecialidad" : "TEC.",
                        "abrvesp" : "TEC.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 28,
                        "idfuerza" : 4,
                        "nomespecialidad" : "MUS.",
                        "abrvesp" : "MUS.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 29,
                        "idfuerza" : 4,
                        "nomespecialidad" : "VIT.",
                        "abrvesp" : "VIT.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 30,
                        "idfuerza" : 4,
                        "nomespecialidad" : "DESA.",
                        "abrvesp" : "DESA.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 31,
                        "idfuerza" : 4,
                        "nomespecialidad" : "MUS.NO EGR*",
                        "abrvesp" : "MUS.NO EGR*",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 32,
                        "idfuerza" : 4,
                        "nomespecialidad" : "STA.",
                        "abrvesp" : "STA.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 33,
                        "idfuerza" : 4,
                        "nomespecialidad" : "TEC.IM.",
                        "abrvesp" : "TEC.IM.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 34,
                        "idfuerza" : 4,
                        "nomespecialidad" : "IM.",
                        "abrvesp" : "IM.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 35,
                        "idfuerza" : 4,
                        "nomespecialidad" : "TEC.AV.",
                        "abrvesp" : "TEC.AV.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 36,
                        "idfuerza" : 5,
                        "nomespecialidad" : "CGON.",
                        "abrvesp" : "CGON.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 37,
                        "idfuerza" : 5,
                        "nomespecialidad" : ".",
                        "abrvesp" : ".",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 38,
                        "idfuerza" : 5,
                        "nomespecialidad" : "MUS.",
                        "abrvesp" : "MUS.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 39,
                        "idfuerza" : 5,
                        "nomespecialidad" : "STA.",
                        "abrvesp" : "STA.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 40,
                        "idfuerza" : 5,
                        "nomespecialidad" : "VIT.",
                        "abrvesp" : "VIT.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 41,
                        "idfuerza" : 5,
                        "nomespecialidad" : "MUS.NO EGR*",
                        "abrvesp" : "MUS.NO EGR*",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 42,
                        "idfuerza" : 5,
                        "nomespecialidad" : "MOT.",
                        "abrvesp" : "MOT.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 43,
                        "idfuerza" : 3,
                        "nomespecialidad" : "DEPSSM.",
                        "abrvesp" : "DEPSSM.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 44,
                        "idfuerza" : 3,
                        "nomespecialidad" : "DEPSS.",
                        "abrvesp" : "DEPSS.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 45,
                        "idfuerza" : 3,
                        "nomespecialidad" : "MUS.NE*",
                        "abrvesp" : "MUS.NE*",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 46,
                        "idfuerza" : 3,
                        "nomespecialidad" : "SERV.",
                        "abrvesp" : "SERV.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 47,
                        "idfuerza" : 3,
                        "nomespecialidad" : "DESA.",
                        "abrvesp" : "DESA.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 48,
                        "idfuerza" : 3,
                        "nomespecialidad" : "PROF.",
                        "abrvesp" : "PROF.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 49,
                        "idfuerza" : 5,
                        "nomespecialidad" : "DEPSS.",
                        "abrvesp" : "DEPSS.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 50,
                        "idfuerza" : 5,
                        "nomespecialidad" : "DEPSSM.",
                        "abrvesp" : "DEPSSM.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 51,
                        "idfuerza" : 5,
                        "nomespecialidad" : "DEPSSN.",
                        "abrvesp" : "DEPSSN.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 52,
                        "idfuerza" : 5,
                        "nomespecialidad" : "DEPSS.",
                        "abrvesp" : "DEPSS.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 53,
                        "idfuerza" : 5,
                        "nomespecialidad" : "MUS.NE*",
                        "abrvesp" : "MUS.NE*",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 54,
                        "idfuerza" : 5,
                        "nomespecialidad" : "PROF.",
                        "abrvesp" : "PROF.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 55,
                        "idfuerza" : 5,
                        "nomespecialidad" : "DESN.",
                        "abrvesp" : "DESN",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 56,
                        "idfuerza" : 4,
                        "nomespecialidad" : "DESAM.",
                        "abrvesp" : "DESAM.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 57,
                        "idfuerza" : 4,
                        "nomespecialidad" : "DEPSSM.",
                        "abrvesp" : "DEPSSM.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 58,
                        "idfuerza" : 4,
                        "nomespecialidad" : "MUS.NE*",
                        "abrvesp" : "MUS.NE*",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 59,
                        "idfuerza" : 4,
                        "nomespecialidad" : "S.T.A.",
                        "abrvesp" : "S.T.A.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 60,
                        "idfuerza" : 4,
                        "nomespecialidad" : "PROF.",
                        "abrvesp" : "PROF.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 61,
                        "idfuerza" : 4,
                        "nomespecialidad" : "INV.",
                        "abrvesp" : "INV.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 62,
                        "idfuerza" : 4,
                        "nomespecialidad" : "DEPSS.",
                        "abrvesp" : "DEPSS.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 63,
                        "idfuerza" : 3,
                        "nomespecialidad" : "DEPSS",
                        "abrvesp" : "DEPSS",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 64,
                        "idfuerza" : 3,
                        "nomespecialidad" : "DEPSSM",
                        "abrvesp" : "DEPSSM",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 65,
                        "idfuerza" : 5,
                        "nomespecialidad" : "CGONEL.",
                        "abrvesp" : "CGONEL.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 66,
                        "idfuerza" : 5,
                        "nomespecialidad" : "SAN.",
                        "abrvesp" : "SAN.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 67,
                        "idfuerza" : 3,
                        "nomespecialidad" : "TEC. ADM.",
                        "abrvesp" : "TEC. ADM.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 68,
                        "idfuerza" : 4,
                        "nomespecialidad" : "D.A.",
                        "abrvesp" : "D.A.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 69,
                        "idfuerza" : 3,
                        "nomespecialidad" : "M.A.",
                        "abrvesp" : "M.A.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 70,
                        "idfuerza" : 3,
                        "nomespecialidad" : "INT.",
                        "abrvesp" : "INT.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 71,
                        "idfuerza" : 5,
                        "nomespecialidad" : "CGONMC.",
                        "abrvesp" : "CGONMC.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 72,
                        "idfuerza" : 5,
                        "nomespecialidad" : "CGONMQ.",
                        "abrvesp" : "CGONMQ.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 73,
                        "idfuerza" : 5,
                        "nomespecialidad" : "CGONAD.",
                        "abrvesp" : "CGONAD.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 74,
                        "idfuerza" : 5,
                        "nomespecialidad" : "CGONCO.",
                        "abrvesp" : "CGONCO.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 75,
                        "idfuerza" : 3,
                        "nomespecialidad" : "LOG.",
                        "abrvesp" : "LOG.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 76,
                        "idfuerza" : 3,
                        "nomespecialidad" : "TGRAFO.",
                        "abrvesp" : "TGRAFO.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 77,
                        "idfuerza" : 5,
                        "nomespecialidad" : "CGONMS.",
                        "abrvesp" : "CGONMS.",
                        "activo" : 1
                    },
                    {
                        "idespecialidad" : 78,
                        "idfuerza" : 3,
                        "nomespecialidad" : "M.B.",
                        "abrvesp" : "M.B.",
                        "activo" : 1
                    }
                ]}
                ';
            
       
        

        $especiali = json_decode($espe, true);

        foreach($especiali['especialidades'] as $e)
        {
        DB::table('par_especialidades')->insert(['idespecialidad'=>$e['idespecialidad'],'idfuerza'=>$e['idfuerza'],'nomespecialidad'=>$e['nomespecialidad'],'abrvesp'=>$e['abrvesp']]);
        }
    }
}
