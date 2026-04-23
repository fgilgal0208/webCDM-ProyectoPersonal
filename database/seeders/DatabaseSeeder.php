<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Game;
use App\Models\Standing;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Nombres y nombres de archivo de escudos a colocar en storage/app/public/escudos/
        $equiposInfo = [
            'C. D. MURIANENSE' => 'murianense.jpg',
            'CLUB DEPORTIVO LA DESCARGA' => 'descarga.png',
            'C.D. DOS TORRES' => 'dos_torres.png',
            'C.D. FÚTBOL BASE MELLARIA' => 'mellaria.png',
            'C.D. VILLANUEVA DEL DUQUE' => 'villanueva.png',
            'CARDEÑA ATLETICO C.F.' => 'cardena.png',
            'FIGUEROA C.D.' => 'figueroa.png',
            'C.D. MOJINO' => 'mojino.png',
            'C.D. AD Miralbaida A' => 'miralbaida.png', // He quitado las comillas extra para evitar errores
            'C.D. AÑORA' => 'anora.png',
            'C.D. AVEJOE' => 'avejoe.png',
            'C.D. EL CARPIO C.F.' => 'el_carpio.png',
            'C.D. ATLÉTICO MONTOREÑO' => 'montoreno.png',
            'U.D. BELALCAZAR' => 'belalcazar.png',
            'EL VISO C.D. A.D.' => 'el_viso.png',
        ];

        $equiposMap = [];
        $standingsMath = [];

        // 2. Crear los equipos en la DB y preparar las matemáticas
        foreach ($equiposInfo as $nombre => $escudo) {
            $team = Team::create([
                'nombre' => $nombre,
                'escudo_path' => 'escudos/' . $escudo,
                'es_mi_equipo' => ($nombre === 'C. D. MURIANENSE')
            ]);
            $equiposMap[$nombre] = $team->id;
            
            // Inicializar contadores a 0
            $standingsMath[$team->id] = ['pj'=>0, 'pg'=>0, 'pe'=>0, 'pp'=>0, 'gf'=>0, 'gc'=>0, 'pts'=>0];
        }

        // 3. Listado masivo de las 24 Jornadas (He limpiado tus datos y asignado 3-0 a Mojino cuando faltaba)
        $partidosData = "
1|CLUB DEPORTIVO LA DESCARGA|C.D. DOS TORRES|4-0
1|C.D. FÚTBOL BASE MELLARIA|C.D. VILLANUEVA DEL DUQUE|1-3
1|CARDEÑA ATLETICO C.F.|FIGUEROA C.D.|1-0
1|C.D. MOJINO|C.D. AD Miralbaida A|3-0
1|C.D. AÑORA|C. D. MURIANENSE|3-1
1|C.D. AVEJOE|C.D. EL CARPIO C.F.|6-1
1|C.D. ATLÉTICO MONTOREÑO|U.D. BELALCAZAR|2-2
2|C.D. FÚTBOL BASE MELLARIA|C.D. AD Miralbaida A|3-0
2|C.D. DOS TORRES|C.D. MOJINO|2-1
2|CARDEÑA ATLETICO C.F.|C. D. MURIANENSE|3-1
2|C.D. AVEJOE|C.D. VILLANUEVA DEL DUQUE|0-3
2|FIGUEROA C.D.|C.D. EL CARPIO C.F.|0-2
2|CLUB DEPORTIVO LA DESCARGA|U.D. BELALCAZAR|1-1
2|C.D. ATLÉTICO MONTOREÑO|EL VISO C.D. A.D.|0-3
3|CARDEÑA ATLETICO C.F.|C.D. AÑORA|3-0
3|C.D. VILLANUEVA DEL DUQUE|FIGUEROA C.D.|4-0
3|U.D. BELALCAZAR|C.D. MOJINO|2-1
3|EL VISO C.D. A.D.|CLUB DEPORTIVO LA DESCARGA|1-0
3|C. D. MURIANENSE|C.D. EL CARPIO C.F.|1-1
3|C.D. FÚTBOL BASE MELLARIA|C.D. DOS TORRES|8-1
3|C.D. AD Miralbaida A|C.D. AVEJOE|4-3
4|C.D. MOJINO|EL VISO C.D. A.D.|6-2
4|C.D. ATLÉTICO MONTOREÑO|CLUB DEPORTIVO LA DESCARGA|1-1
4|C.D. AÑORA|C.D. EL CARPIO C.F.|2-3
4|C.D. VILLANUEVA DEL DUQUE|C. D. MURIANENSE|1-4
4|C.D. FÚTBOL BASE MELLARIA|U.D. BELALCAZAR|3-2
4|FIGUEROA C.D.|C.D. AD Miralbaida A|2-3
4|C.D. DOS TORRES|C.D. AVEJOE|4-6
5|C.D. AÑORA|C.D. VILLANUEVA DEL DUQUE|2-1
5|C.D. FÚTBOL BASE MELLARIA|EL VISO C.D. A.D.|7-3
5|C.D. MOJINO|C.D. ATLÉTICO MONTOREÑO|0-3
5|C. D. MURIANENSE|C.D. AD Miralbaida A|0-0
5|FIGUEROA C.D.|C.D. DOS TORRES|4-0
5|CARDEÑA ATLETICO C.F.|C.D. EL CARPIO C.F.|3-2
5|C.D. AVEJOE|U.D. BELALCAZAR|3-1
6|C.D. AD Miralbaida A|C.D. AÑORA|3-2
6|CLUB DEPORTIVO LA DESCARGA|C.D. MOJINO|1-0
6|C.D. ATLÉTICO MONTOREÑO|C.D. FÚTBOL BASE MELLARIA|3-1
6|EL VISO C.D. A.D.|C.D. AVEJOE|0-3
6|C.D. VILLANUEVA DEL DUQUE|CARDEÑA ATLETICO C.F.|1-3
6|C.D. DOS TORRES|C. D. MURIANENSE|2-2
6|U.D. BELALCAZAR|FIGUEROA C.D.|6-1
7|C. D. MURIANENSE|U.D. BELALCAZAR|1-6
7|C.D. AÑORA|C.D. DOS TORRES|2-3
7|C.D. EL CARPIO C.F.|C.D. VILLANUEVA DEL DUQUE|3-0
7|FIGUEROA C.D.|EL VISO C.D. A.D.|3-1
7|CARDEÑA ATLETICO C.F.|C.D. AD Miralbaida A|1-2
7|C.D. AVEJOE|C.D. ATLÉTICO MONTOREÑO|2-1
7|C.D. FÚTBOL BASE MELLARIA|CLUB DEPORTIVO LA DESCARGA|1-2
8|U.D. BELALCAZAR|C.D. AÑORA|2-3
8|C.D. AD Miralbaida A|C.D. EL CARPIO C.F.|0-2
8|CLUB DEPORTIVO LA DESCARGA|C.D. AVEJOE|3-0
8|C.D. MOJINO|C.D. FÚTBOL BASE MELLARIA|1-3
8|EL VISO C.D. A.D.|C. D. MURIANENSE|2-1
8|C.D. ATLÉTICO MONTOREÑO|FIGUEROA C.D.|3-2
8|C.D. DOS TORRES|CARDEÑA ATLETICO C.F.|1-0
9|C. D. MURIANENSE|C.D. ATLÉTICO MONTOREÑO|0-2
9|C.D. VILLANUEVA DEL DUQUE|C.D. AD Miralbaida A|1-2
9|CARDEÑA ATLETICO C.F.|U.D. BELALCAZAR|4-3
9|C.D. AÑORA|EL VISO C.D. A.D.|3-1
9|C.D. EL CARPIO C.F.|C.D. DOS TORRES|0-1
9|FIGUEROA C.D.|CLUB DEPORTIVO LA DESCARGA|2-2
9|C.D. AVEJOE|C.D. MOJINO|5-2
10|U.D. BELALCAZAR|C.D. EL CARPIO C.F.|3-0
10|CLUB DEPORTIVO LA DESCARGA|C. D. MURIANENSE|5-0
10|EL VISO C.D. A.D.|CARDEÑA ATLETICO C.F.|1-1
10|C.D. MOJINO|FIGUEROA C.D.|1-2
10|C.D. ATLÉTICO MONTOREÑO|C.D. AÑORA|3-3
10|C.D. DOS TORRES|C.D. VILLANUEVA DEL DUQUE|2-1
10|C.D. FÚTBOL BASE MELLARIA|C.D. AVEJOE|4-2
11|C.D. AD Miralbaida A|C.D. DOS TORRES|3-1
11|CARDEÑA ATLETICO C.F.|C.D. ATLÉTICO MONTOREÑO|0-5
11|C. D. MURIANENSE|C.D. MOJINO|3-0
11|C.D. VILLANUEVA DEL DUQUE|U.D. BELALCAZAR|1-2
11|C.D. AÑORA|CLUB DEPORTIVO LA DESCARGA|0-2
11|C.D. EL CARPIO C.F.|EL VISO C.D. A.D.|1-0
11|FIGUEROA C.D.|C.D. FÚTBOL BASE MELLARIA|0-2
12|C.D. MOJINO|C.D. AÑORA|0-3
12|EL VISO C.D. A.D.|C.D. VILLANUEVA DEL DUQUE|2-1
12|CLUB DEPORTIVO LA DESCARGA|CARDEÑA ATLETICO C.F.|3-1
12|C.D. ATLÉTICO MONTOREÑO|C.D. EL CARPIO C.F.|5-1
12|C.D. AVEJOE|FIGUEROA C.D.|4-1
12|C.D. FÚTBOL BASE MELLARIA|C. D. MURIANENSE|3-0
12|U.D. BELALCAZAR|C.D. AD Miralbaida A|2-1
13|C.D. VILLANUEVA DEL DUQUE|C.D. ATLÉTICO MONTOREÑO|0-2
13|C.D. AD Miralbaida A|EL VISO C.D. A.D.|2-0
13|C. D. MURIANENSE|C.D. AVEJOE|0-0
13|CARDEÑA ATLETICO C.F.|C.D. MOJINO|1-0
13|C.D. EL CARPIO C.F.|CLUB DEPORTIVO LA DESCARGA|2-0
13|U.D. BELALCAZAR|C.D. DOS TORRES|4-0
13|C.D. FÚTBOL BASE MELLARIA|C.D. AÑORA|5-0
14|C.D. VILLANUEVA DEL DUQUE|CLUB DEPORTIVO LA DESCARGA|1-0
14|EL VISO C.D. A.D.|C.D. DOS TORRES|1-1
14|C.D. ATLÉTICO MONTOREÑO|C.D. AD Miralbaida A|3-0
14|C.D. FÚTBOL BASE MELLARIA|CARDEÑA ATLETICO C.F.|6-1
14|C.D. AÑORA|C.D. AVEJOE|2-1
14|C.D. EL CARPIO C.F.|C.D. MOJINO|2-5
14|FIGUEROA C.D.|C. D. MURIANENSE|1-3
15|U.D. BELALCAZAR|EL VISO C.D. A.D.|1-0
15|C.D. MOJINO|C.D. VILLANUEVA DEL DUQUE|2-1
15|CARDEÑA ATLETICO C.F.|C.D. AVEJOE|0-5
15|C.D. ATLÉTICO MONTOREÑO|C.D. DOS TORRES|5-0
15|C.D. AD Miralbaida A|CLUB DEPORTIVO LA DESCARGA|1-1
15|C.D. AÑORA|FIGUEROA C.D.|2-2
15|C.D. FÚTBOL BASE MELLARIA|C.D. EL CARPIO C.F.|3-0
16|CLUB DEPORTIVO LA DESCARGA|C.D. DOS TORRES|0-3
16|C.D. ATLÉTICO MONTOREÑO|U.D. BELALCAZAR|0-0
16|C.D. MOJINO|C.D. AD Miralbaida A|7-2
16|C.D. FÚTBOL BASE MELLARIA|C.D. VILLANUEVA DEL DUQUE|0-2
16|CARDEÑA ATLETICO C.F.|FIGUEROA C.D.|1-3
16|C.D. AVEJOE|C.D. EL CARPIO C.F.|0-3
16|C.D. AÑORA|C. D. MURIANENSE|5-1
17|C.D. MOJINO|C.D. DOS TORRES|0-3
17|C.D. ATLÉTICO MONTOREÑO|EL VISO C.D. A.D.|5-2
17|FIGUEROA C.D.|C.D. EL CARPIO C.F.|4-0
17|C.D. AVEJOE|C.D. VILLANUEVA DEL DUQUE|6-0
17|C.D. FÚTBOL BASE MELLARIA|C.D. AD Miralbaida A|3-2
17|CLUB DEPORTIVO LA DESCARGA|U.D. BELALCAZAR|3-1
17|CARDEÑA ATLETICO C.F.|C. D. MURIANENSE|4-1
18|FIGUEROA C.D.|C.D. VILLANUEVA DEL DUQUE|1-1
18|U.D. BELALCAZAR|C.D. MOJINO|3-0
18|C.D. AVEJOE|C.D. AD Miralbaida A|1-4
18|CARDEÑA ATLETICO C.F.|C.D. AÑORA|2-2
18|CLUB DEPORTIVO LA DESCARGA|EL VISO C.D. A.D.|1-2
18|C. D. MURIANENSE|C.D. EL CARPIO C.F.|2-2
18|C.D. FÚTBOL BASE MELLARIA|C.D. DOS TORRES|3-1
19|C. D. MURIANENSE|C.D. VILLANUEVA DEL DUQUE|1-2
19|C.D. MOJINO|EL VISO C.D. A.D.|0-3
19|CLUB DEPORTIVO LA DESCARGA|C.D. ATLÉTICO MONTOREÑO|0-2
19|C.D. AVEJOE|C.D. DOS TORRES|7-0
19|C.D. AÑORA|C.D. EL CARPIO C.F.|1-0
19|C.D. FÚTBOL BASE MELLARIA|U.D. BELALCAZAR|5-7
19|C.D. AD Miralbaida A|FIGUEROA C.D.|5-0
20|C.D. ATLÉTICO MONTOREÑO|C.D. MOJINO|3-0
20|C.D. AD Miralbaida A|C. D. MURIANENSE|1-0
20|C.D. AÑORA|C.D. VILLANUEVA DEL DUQUE|2-0
20|C.D. FÚTBOL BASE MELLARIA|EL VISO C.D. A.D.|1-1
20|FIGUEROA C.D.|C.D. DOS TORRES|2-1
20|U.D. BELALCAZAR|C.D. AVEJOE|1-1
20|CARDEÑA ATLETICO C.F.|C.D. EL CARPIO C.F.|3-0
21|C.D. MOJINO|CLUB DEPORTIVO LA DESCARGA|0-3
21|C. D. MURIANENSE|C.D. DOS TORRES|5-1
21|FIGUEROA C.D.|U.D. BELALCAZAR|3-0
21|CARDEÑA ATLETICO C.F.|C.D. VILLANUEVA DEL DUQUE|2-0
21|C.D. ATLÉTICO MONTOREÑO|C.D. FÚTBOL BASE MELLARIA|3-2
21|C.D. AÑORA|C.D. AD Miralbaida A|1-3
21|C.D. AVEJOE|EL VISO C.D. A.D.|2-1
22|U.D. BELALCAZAR|C. D. MURIANENSE|3-0
22|CARDEÑA ATLETICO C.F.|C.D. AD Miralbaida A|4-0
22|C.D. FÚTBOL BASE MELLARIA|CLUB DEPORTIVO LA DESCARGA|2-0
22|EL VISO C.D. A.D.|FIGUEROA C.D.|5-3
22|C.D. EL CARPIO C.F.|C.D. VILLANUEVA DEL DUQUE|3-2
22|C.D. AÑORA|C.D. DOS TORRES|0-2
22|C.D. ATLÉTICO MONTOREÑO|C.D. AVEJOE|4-2
23|C.D. FÚTBOL BASE MELLARIA|C.D. MOJINO|3-0
23|C. D. MURIANENSE|EL VISO C.D. A.D.|0-0
23|C.D. AÑORA|U.D. BELALCAZAR|2-1
23|C.D. AVEJOE|CLUB DEPORTIVO LA DESCARGA|0-0
23|C.D. EL CARPIO C.F.|C.D. AD Miralbaida A|0-3
23|CARDEÑA ATLETICO C.F.|C.D. DOS TORRES|1-3
23|C.D. ATLÉTICO MONTOREÑO|FIGUEROA C.D.|0-1
24|C.D. MOJINO|C.D. AVEJOE|0-3
24|C.D. VILLANUEVA DEL DUQUE|C.D. AD Miralbaida A|1-1
24|C.D. DOS TORRES|C.D. EL CARPIO C.F.|7-4
24|CLUB DEPORTIVO LA DESCARGA|FIGUEROA C.D.|1-1
24|C.D. AÑORA|EL VISO C.D. A.D.|3-3
24|CARDEÑA ATLETICO C.F.|U.D. BELALCAZAR|3-1
24|C.D. ATLÉTICO MONTOREÑO|C. D. MURIANENSE|2-1";

        // 4. Crear partidos y calcular clasificación
        $lineas = explode("\n", trim($partidosData));

        foreach ($lineas as $linea) {
            $datos = explode("|", trim($linea));
            if(count($datos) === 4) {
                $jornada = $datos[0];
                $local = $datos[1];
                $visitante = $datos[2];
                $goles = explode("-", $datos[3]);
                $gl = (int) $goles[0];
                $gv = (int) $goles[1];

                $idLocal = $equiposMap[$local];
                $idVisitante = $equiposMap[$visitante];

                // Guardar partido en base de datos

                Game::create([
                    'jornada' => $jornada,
                    'local_team_id' => $idLocal,
                    'visitor_team_id' => $idVisitante,
                    'goles_local' => $gl,
                    'goles_visitante' => $gv,
                    'fecha_partido' => now()->subDays(100 - $jornada)->format('Y-m-d') 
                ]);

                // Matemáticas Equipo Local
                $standingsMath[$idLocal]['pj']++;
                $standingsMath[$idLocal]['gf'] += $gl;
                $standingsMath[$idLocal]['gc'] += $gv;
                if($gl > $gv) {
                    $standingsMath[$idLocal]['pg']++;
                    $standingsMath[$idLocal]['pts'] += 3;
                } elseif($gl === $gv) {
                    $standingsMath[$idLocal]['pe']++;
                    $standingsMath[$idLocal]['pts'] += 1;
                } else {
                    $standingsMath[$idLocal]['pp']++;
                }

                // Matemáticas Equipo Visitante
                $standingsMath[$idVisitante]['pj']++;
                $standingsMath[$idVisitante]['gf'] += $gv;
                $standingsMath[$idVisitante]['gc'] += $gl;
                if($gv > $gl) {
                    $standingsMath[$idVisitante]['pg']++;
                    $standingsMath[$idVisitante]['pts'] += 3;
                } elseif($gv === $gl) {
                    $standingsMath[$idVisitante]['pe']++;
                    $standingsMath[$idVisitante]['pts'] += 1;
                } else {
                    $standingsMath[$idVisitante]['pp']++;
                }
            }
        }

        // 5. Guardar la clasificación final en la base de datos
        foreach ($standingsMath as $id => $stats) {
            Standing::create([
                'team_id' => $id,
                'posicion' => 0, // No hace falta, el controlador lo ordena solo
                'puntos' => $stats['pts'],
                'jugados' => $stats['pj'],
                'ganados' => $stats['pg'],
                'empatados' => $stats['pe'],
                'perdidos' => $stats['pp'],
                'goles_favor' => $stats['gf'],
                'goles_contra' => $stats['gc']
            ]);
        }
    }
}