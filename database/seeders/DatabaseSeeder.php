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
        // 1. Equipos
        $equiposInfo = [
            'C. D. MURIANENSE' => 'murianense.jpg',
            'CLUB DEPORTIVO LA DESCARGA' => 'descarga.png',
            'C.D. DOS TORRES' => 'dos_torres.png',
            'C.D. FÚTBOL BASE MELLARIA' => 'mellaria.png',
            'C.D. VILLANUEVA DEL DUQUE' => 'villanueva.png',
            'CARDEÑA ATLETICO C.F.' => 'cardena.png',
            'FIGUEROA C.D.' => 'figueroa.png',
            'C.D. MOJINO' => 'mojino.png',
            'C.D. AD Miralbaida A' => 'miralbaida.png',
            'C.D. AÑORA' => 'anora.png',
            'C.D. AVEJOE' => 'avejoe.png',
            'C.D. EL CARPIO C.F.' => 'el_carpio.png',
            'C.D. ATLÉTICO MONTOREÑO' => 'montoreno.png',
            'U.D. BELALCAZAR' => 'belalcazar.png',
            'EL VISO C.D. A.D.' => 'el_viso.png',
        ];

        $equiposMap = [];
        $standingsMath = [];

        foreach ($equiposInfo as $nombre => $escudo) {
            $team = Team::create([
                'nombre' => $nombre,
                'escudo_path' => 'escudos/' . $escudo,
                'es_mi_equipo' => ($nombre === 'C. D. MURIANENSE')
            ]);
            $equiposMap[$nombre] = $team->id;
            $standingsMath[$team->id] = ['pj'=>0, 'pg'=>0, 'pe'=>0, 'pp'=>0, 'gf'=>0, 'gc'=>0, 'pts'=>0];
        }

        // 2. TODOS TUS DATOS (Jugados) + JORNADAS FUTURAS (vs)
        $partidosData = "
1|CLUB DEPORTIVO LA DESCARGA|C.D. DOS TORRES|4-0|2025-11-09
1|C.D. FÚTBOL BASE MELLARIA|C.D. VILLANUEVA DEL DUQUE|1-3|2025-11-09
1|CARDEÑA ATLETICO C.F.|FIGUEROA C.D.|0-1|2025-11-09
1|C.D. MOJINO|C.D. AD Miralbaida A|3-0|2025-11-09
1|C. D. MURIANENSE|C.D. AÑORA|3-1|2025-11-09
1|C.D. AVEJOE|C.D. EL CARPIO C.F.|6-1|2025-11-09
1|C.D. ATLÉTICO MONTOREÑO|U.D. BELALCAZAR|2-2|2025-11-09
2|C.D. AD Miralbaida A|C.D. FÚTBOL BASE MELLARIA|3-0|2025-11-16
2|C.D. DOS TORRES|C.D. MOJINO|2-1|2025-11-16
2|CARDEÑA ATLETICO C.F.|C. D. MURIANENSE|3-1|2025-11-16
2|C.D. VILLANUEVA DEL DUQUE|C.D. AVEJOE|0-3|2025-11-16
2|C.D. EL CARPIO C.F.|FIGUEROA C.D.|0-2|2025-11-16
2|CLUB DEPOfRTIVO LA DESCARGA|U.D. BELALCAZAR|1-1|2025-11-16
2|EL VISO C.D. A.D.|C.D. ATLÉTICO MONTOREÑO|0-3|2025-11-16
3|C.D. AÑORA|CARDEÑA ATLETICO C.F.|3-0|2025-11-23
3|FIGUEROA C.D.|C.D. VILLANUEVA DEL DUQUE|4-0|2025-11-23
3|C.D. MOJINO|U.D. BELALCAZAR|2-1|2025-11-23
3|CLUB DEPORTIVO LA DESCARGA|EL VISO C.D. A.D.|1-0|2025-11-23
3|C. D. MURIANENSE|C.D. EL CARPIO C.F.|1-1|2025-11-23
3|C.D. FÚTBOL BASE MELLARIA|C.D. DOS TORRES|8-1|2025-11-23
3|C.D. AVEJOE|C.D. AD Miralbaida A|4-3|2025-11-23
4|EL VISO C.D. A.D.|C.D. MOJINO|6-2|2025-11-30
4|C.D. ATLÉTICO MONTOREÑO|CLUB DEPORTIVO LA DESCARGA|1-1|2025-11-30
4|C.D. EL CARPIO C.F.|C.D. AÑORA|2-3|2025-11-30
4|C.D. VILLANUEVA DEL DUQUE|C. D. MURIANENSE|1-4|2025-11-30
4|U.D. BELALCAZAR|C.D. FÚTBOL BASE MELLARIA|3-2|2025-11-30
4|C.D. AD Miralbaida A|FIGUEROA C.D.|2-3|2025-11-30
4|C.D. DOS TORRES|C.D. AVEJOE|4-6|2025-11-30
5|C.D. AÑORA|C.D. VILLANUEVA DEL DUQUE|2-1|2025-12-07
5|C.D. FÚTBOL BASE MELLARIA|EL VISO C.D. A.D.|6-3|2025-12-07
5|C.D. MOJINO|C.D. ATLÉTICO MONTOREÑO|0-3|2025-12-07
5|C. D. MURIANENSE|C.D. AD Miralbaida A|0-0|2025-12-07
5|FIGUEROA C.D.|C.D. DOS TORRES|4-0|2025-12-07
5|CARDEÑA ATLETICO C.F.|C.D. EL CARPIO C.F.|3-2|2025-12-07
5|C.D. AVEJOE|U.D. BELALCAZAR|3-1|2025-12-07
6|C.D. AD Miralbaida A|C.D. AÑORA|3-2|2025-12-14
6|CLUB DEPORTIVO LA DESCARGA|C.D. MOJINO|1-0|2025-12-14
6|C.D. ATLÉTICO MONTOREÑO|C.D. FÚTBOL BASE MELLARIA|3-1|2025-12-14
6|EL VISO C.D. A.D.|C.D. AVEJOE|0-3|2025-12-14
6|C.D. VILLANUEVA DEL DUQUE|CARDEÑA ATLETICO C.F.|1-3|2025-12-14
6|C.D. DOS TORRES|C. D. MURIANENSE|2-2|2025-12-14
6|U.D. BELALCAZAR|FIGUEROA C.D.|6-1|2025-12-14
7|C. D. MURIANENSE|U.D. BELALCAZAR|1-6|2025-12-21
7|C.D. AÑORA|C.D. DOS TORRES|2-3|2025-12-21
7|C.D. EL CARPIO C.F.|C.D. VILLANUEVA DEL DUQUE|3-0|2025-12-21
7|FIGUEROA C.D.|EL VISO C.D. A.D.|3-1|2025-12-21
7|CARDEÑA ATLETICO C.F.|C.D. AD Miralbaida A|1-2|2025-12-21
7|C.D. AVEJOE|C.D. ATLÉTICO MONTOREÑO|2-1|2025-12-21
7|C.D. FÚTBOL BASE MELLARIA|CLUB DEPORTIVO LA DESCARGA|1-2|2025-12-21

8|U.D. BELALCAZAR|C.D. AÑORA|2-3|2025-12-28
8|C.D. AD Miralbaida A|C.D. EL CARPIO C.F.|0-2|2025-12-28
8|CLUB DEPORTIVO LA DESCARGA|C.D. AVEJOE|3-0|2025-12-28
8|C.D. MOJINO|C.D. FÚTBOL BASE MELLARIA|1-3|2025-12-28
8|EL VISO C.D. A.D.|C. D. MURIANENSE|2-1|2025-12-28
8|C.D. ATLÉTICO MONTOREÑO|FIGUEROA C.D.|3-2|2025-12-28
8|C.D. DOS TORRES|CARDEÑA ATLETICO C.F.|1-0|2025-12-28

9|C. D. MURIANENSE|C.D. ATLÉTICO MONTOREÑO|0-2|2026-01-04
9|C.D. VILLANUEVA DEL DUQUE|C.D. AD Miralbaida A|1-2|2026-01-04
9|CARDEÑA ATLETICO C.F.|U.D. BELALCAZAR|4-3|2026-01-04
9|C.D. AÑORA|EL VISO C.D. A.D.|3-1|2026-01-04
9|C.D. EL CARPIO C.F.|C.D. DOS TORRES|0-1|2026-01-04
9|FIGUEROA C.D.|CLUB DEPORTIVO LA DESCARGA|2-2|2026-01-04
9|C.D. AVEJOE|C.D. MOJINO|5-2|2026-01-04
10|U.D. BELALCAZAR|C.D. EL CARPIO C.F.|3-0|2026-01-11
10|CLUB DEPORTIVO LA DESCARGA|C. D. MURIANENSE|5-0|2026-01-11
10|EL VISO C.D. A.D.|CARDEÑA ATLETICO C.F.|1-1|2026-01-11
10|C.D. MOJINO|FIGUEROA C.D.|1-2|2026-01-11
10|C.D. ATLÉTICO MONTOREÑO|C.D. AÑORA|3-3|2026-01-11
10|C.D. DOS TORRES|C.D. VILLANUEVA DEL DUQUE|2-1|2026-01-11
10|C.D. FÚTBOL BASE MELLARIA|C.D. AVEJOE|4-2|2026-01-11
11|C.D. AD Miralbaida A|C.D. DOS TORRES|3-1|2026-01-18
11|CARDEÑA ATLETICO C.F.|C.D. ATLÉTICO MONTOREÑO|0-5|2026-01-18
11|C. D. MURIANENSE|C.D. MOJINO|3-0|2026-01-18
11|C.D. VILLANUEVA DEL DUQUE|U.D. BELALCAZAR|1-2|2026-01-18
11|C.D. AÑORA|CLUB DEPORTIVO LA DESCARGA|0-2|2026-01-18
11|C.D. EL CARPIO C.F.|EL VISO C.D. A.D.|1-0|2026-01-18
11|FIGUEROA C.D.|C.D. FÚTBOL BASE MELLARIA|0-2|2026-01-18
12|C.D. MOJINO|C.D. AÑORA|0-3|2026-01-25
12|EL VISO C.D. A.D.|C.D. VILLANUEVA DEL DUQUE|2-1|2026-01-25
12|CLUB DEPORTIVO LA DESCARGA|CARDEÑA ATLETICO C.F.|3-1|2026-01-25
12|C.D. ATLÉTICO MONTOREÑO|C.D. EL CARPIO C.F.|5-1|2026-01-25
12|C.D. AVEJOE|FIGUEROA C.D.|4-1|2026-01-25
12|C.D. FÚTBOL BASE MELLARIA|C. D. MURIANENSE|3-0|2026-01-25
12|U.D. BELALCAZAR|C.D. AD Miralbaida A|2-1|2026-01-25
13|C.D. VILLANUEVA DEL DUQUE|C.D. ATLÉTICO MONTOREÑO|0-2|2026-02-01
13|C.D. AD Miralbaida A|EL VISO C.D. A.D.|2-0|2026-02-01
13|C. D. MURIANENSE|C.D. AVEJOE|0-0|2026-02-01
13|CARDEÑA ATLETICO C.F.|C.D. MOJINO|1-0|2026-02-01
13|C.D. EL CARPIO C.F.|CLUB DEPORTIVO LA DESCARGA|2-0|2026-02-01
13|U.D. BELALCAZAR|C.D. DOS TORRES|4-0|2026-02-01
13|C.D. FÚTBOL BASE MELLARIA|C.D. AÑORA|5-0|2026-02-01
14|C.D. VILLANUEVA DEL DUQUE|CLUB DEPORTIVO LA DESCARGA|1-0|2026-02-08
14|EL VISO C.D. A.D.|C.D. DOS TORRES|1-1|2026-02-08
14|C.D. ATLÉTICO MONTOREÑO|C.D. AD Miralbaida A|3-0|2026-02-08
14|C.D. FÚTBOL BASE MELLARIA|CARDEÑA ATLETICO C.F.|6-1|2026-02-08
14|C.D. AÑORA|C.D. AVEJOE|2-1|2026-02-08
14|C.D. EL CARPIO C.F.|C.D. MOJINO|2-5|2026-02-08
14|FIGUEROA C.D.|C. D. MURIANENSE|1-3|2026-02-08
15|U.D. BELALCAZAR|EL VISO C.D. A.D.|1-0|2026-02-15
15|C.D. MOJINO|C.D. VILLANUEVA DEL DUQUE|2-1|2026-02-15
15|CARDEÑA ATLETICO C.F.|C.D. AVEJOE|0-5|2026-02-15
15|C.D. ATLÉTICO MONTOREÑO|C.D. DOS TORRES|5-0|2026-02-15
15|C.D. AD Miralbaida A|CLUB DEPORTIVO LA DESCARGA|1-1|2026-02-15
15|C.D. AÑORA|FIGUEROA C.D.|2-2|2026-02-15
15|C.D. FÚTBOL BASE MELLARIA|C.D. EL CARPIO C.F.|3-0|2026-02-15
16|CLUB DEPORTIVO LA DESCARGA|C.D. DOS TORRES|0-3|2026-02-22
16|C.D. ATLÉTICO MONTOREÑO|U.D. BELALCAZAR|0-0|2026-02-22
16|C.D. MOJINO|C.D. AD Miralbaida A|7-2|2026-02-22
16|C.D. FÚTBOL BASE MELLARIA|C.D. VILLANUEVA DEL DUQUE|0-2|2026-02-22
16|CARDEÑA ATLETICO C.F.|FIGUEROA C.D.|1-3|2026-02-22
16|C.D. AVEJOE|C.D. EL CARPIO C.F.|0-3|2026-02-22
16|C.D. AÑORA|C. D. MURIANENSE|5-1|2026-02-22
17|C.D. ATLÉTICO MONTOREÑO|EL VISO C.D. A.D.|5-2|2026-03-01
17|FIGUEROA C.D.|C.D. EL CARPIO C.F.|4-0|2026-03-01
17|C.D. AVEJOE|C.D. VILLANUEVA DEL DUQUE|6-0|2026-03-01
17|C.D. FÚTBOL BASE MELLARIA|C.D. AD Miralbaida A|3-2|2026-03-01
17|CLUB DEPORTIVO LA DESCARGA|U.D. BELALCAZAR|3-1|2026-03-01
17|CARDEÑA ATLETICO C.F.|C. D. MURIANENSE|4-1|2026-03-01
18|FIGUEROA C.D.|C.D. VILLANUEVA DEL DUQUE|1-1|2026-03-08
18|C.D. AVEJOE|C.D. AD Miralbaida A|1-4|2026-03-08
18|CARDEÑA ATLETICO C.F.|C.D. AÑORA|2-2|2026-03-08
18|CLUB DEPORTIVO LA DESCARGA|EL VISO C.D. A.D.|1-2|2026-03-08
18|C. D. MURIANENSE|C.D. EL CARPIO C.F.|2-2|2026-03-08
18|C.D. FÚTBOL BASE MELLARIA|C.D. DOS TORRES|3-1|2026-03-08
19|C. D. MURIANENSE|C.D. VILLANUEVA DEL DUQUE|1-2|2026-03-15
19|CLUB DEPORTIVO LA DESCARGA|C.D. ATLÉTICO MONTOREÑO|0-2|2026-03-15
19|C.D. AVEJOE|C.D. DOS TORRES|7-0|2026-03-15
19|C.D. AÑORA|C.D. EL CARPIO C.F.|1-0|2026-03-15
19|C.D. FÚTBOL BASE MELLARIA|U.D. BELALCAZAR|5-7|2026-03-15
19|C.D. AD Miralbaida A|FIGUEROA C.D.|5-0|2026-03-15
20|C.D. AD Miralbaida A|C. D. MURIANENSE|1-0|2026-03-22
20|C.D. AÑORA|C.D. VILLANUEVA DEL DUQUE|2-0|2026-03-22
20|C.D. FÚTBOL BASE MELLARIA|EL VISO C.D. A.D.|1-1|2026-03-22
20|FIGUEROA C.D.|C.D. DOS TORRES|2-1|2026-03-22
20|U.D. BELALCAZAR|C.D. AVEJOE|1-1|2026-03-22
20|CARDEÑA ATLETICO C.F.|C.D. EL CARPIO C.F.|3-0|2026-03-22
21|C. D. MURIANENSE|C.D. DOS TORRES|5-1|2026-03-29
21|FIGUEROA C.D.|U.D. BELALCAZAR|3-0|2026-03-29
21|CARDEÑA ATLETICO C.F.|C.D. VILLANUEVA DEL DUQUE|2-0|2026-03-29
21|C.D. ATLÉTICO MONTOREÑO|C.D. FÚTBOL BASE MELLARIA|3-2|2026-03-29
21|C.D. AÑORA|C.D. AD Miralbaida A|1-3|2026-03-29
21|C.D. AVEJOE|EL VISO C.D. A.D.|2-1|2026-03-29
22|U.D. BELALCAZAR|C. D. MURIANENSE|3-0|2026-04-05
22|CARDEÑA ATLETICO C.F.|C.D. AD Miralbaida A|4-0|2026-04-05
22|C.D. FÚTBOL BASE MELLARIA|CLUB DEPORTIVO LA DESCARGA|2-0|2026-04-05
22|EL VISO C.D. A.D.|FIGUEROA C.D.|5-3|2026-04-05
22|C.D. EL CARPIO C.F.|C.D. VILLANUEVA DEL DUQUE|3-2|2026-04-05
22|C.D. AÑORA|C.D. DOS TORRES|0-2|2026-04-05
22|C.D. ATLÉTICO MONTOREÑO|C.D. AVEJOE|4-2|2026-04-05
23|C. D. MURIANENSE|EL VISO C.D. A.D.|0-0|2026-04-12
23|C.D. AÑORA|U.D. BELALCAZAR|2-1|2026-04-12
23|C.D. AVEJOE|CLUB DEPORTIVO LA DESCARGA|0-0|2026-04-12
23|C.D. EL CARPIO C.F.|C.D. AD Miralbaida A|0-3|2026-04-12
23|CARDEÑA ATLETICO C.F.|C.D. DOS TORRES|1-3|2026-04-12
23|C.D. ATLÉTICO MONTOREÑO|FIGUEROA C.D.|0-1|2026-04-12
24|C.D. VILLANUEVA DEL DUQUE|C.D. AD Miralbaida A|1-1|2026-04-19
24|C.D. DOS TORRES|C.D. EL CARPIO C.F.|7-4|2026-04-19
24|CLUB DEPORTIVO LA DESCARGA|FIGUEROA C.D.|1-1|2026-04-19
24|C.D. AÑORA|EL VISO C.D. A.D.|3-3|2026-04-19
24|CARDEÑA ATLETICO C.F.|U.D. BELALCAZAR|3-1|2026-04-19
24|C.D. ATLÉTICO MONTOREÑO|C. D. MURIANENSE|2-1|2026-04-19
25|C.D. EL CARPIO C.F.|U.D. BELALCAZAR|4-1|2026-04-26
25|C. D. MURIANENSE|CLUB DEPORTIVO LA DESCARGA|2-1|2026-04-19
25|CARDEÑA ATLETICO C.F.|EL VISO C.D. A.D.|1-0|2026-04-19
25|C.D. AÑORA|C.D. ATLÉTICO MONTOREÑO|0-3|2026-04-19
25|C.D. VILLANUEVA DEL DUQUE|C.D. DOS TORRES|1-0|2026-04-19
25|C.D. AVEJOE|C.D. FÚTBOL BASE MELLARIA|4-1|2026-04-19
26|C.D. DOS TORRES|C.D. AD Miralbaida A|vs|2026-05-03
26|C.D. ATLÉTICO MONTOREÑO|CARDEÑA ATLETICO C.F.|vs|2026-05-03
26|U.D. BELALCAZAR|C.D. VILLANUEVA DEL DUQUE|vs|2026-05-03
26|CLUB DEPORTIVO LA DESCARGA|C.D. AÑORA|vs|2026-05-03
26|EL VISO C.D. A.D.|C.D. EL CARPIO C.F.|vs|2026-05-03
26|C.D. FÚTBOL BASE MELLARIA|FIGUEROA C.D.|vs|2026-05-03
27|C.D. VILLANUEVA DEL DUQUE|EL VISO C.D. A.D.|vs|2026-05-10
27|CARDEÑA ATLETICO C.F.|CLUB DEPORTIVO LA DESCARGA|vs|2026-05-10
27|C.D. EL CARPIO C.F.|C.D. ATLÉTICO MONTOREÑO|vs|2026-05-10
27|FIGUEROA C.D.|C.D. AVEJOE|vs|2026-05-10
27|C. D. MURIANENSE|C.D. FÚTBOL BASE MELLARIA|vs|2026-05-10
27|C.D. AD Miralbaida A|U.D. BELALCAZAR|vs|2026-05-10
28|C.D. ATLÉTICO MONTOREÑO|C.D. VILLANUEVA DEL DUQUE|vs|2026-05-17
28|EL VISO C.D. A.D.|C.D. AD Miralbaida A|vs|2026-05-17
28|C.D. AVEJOE|C. D. MURIANENSE|vs|2026-05-17
28|CLUB DEPORTIVO LA DESCARGA|C.D. EL CARPIO C.F.|vs|2026-05-17
28|C.D. DOS TORRES|U.D. BELALCAZAR|vs|2026-05-17
28|C.D. AÑORA|C.D. FÚTBOL BASE MELLARIA|vs|2026-05-17
29|CLUB DEPORTIVO LA DESCARGA|C.D. VILLANUEVA DEL DUQUE|vs|2026-05-24
29|C.D. DOS TORRES|EL VISO C.D. A.D.|vs|2026-05-24
29|C.D. AD Miralbaida A|C.D. ATLÉTICO MONTOREÑO|vs|2026-05-24
29|CARDEÑA ATLETICO C.F.|C.D. FÚTBOL BASE MELLARIA|vs|2026-05-24
29|C.D. AVEJOE|C.D. AÑORA|vs|2026-05-24
29|C. D. MURIANENSE|FIGUEROA C.D.|vs|2026-05-24
30|EL VISO C.D. A.D.|U.D. BELALCAZAR|vs|2026-05-31
30|C.D. AVEJOE|CARDEÑA ATLETICO C.F.|vs|2026-05-31
30|C.D. DOS TORRES|C.D. ATLÉTICO MONTOREÑO|vs|2026-05-31
30|CLUB DEPORTIVO LA DESCARGA|C.D. AD Miralbaida A|vs|2026-05-31
30|FIGUEROA C.D.|C.D. AÑORA|vs|2026-05-31
30|C.D. EL CARPIO C.F.|C.D. FÚTBOL BASE MELLARIA|vs|2026-05-31
";

        $lineas = explode("\n", trim($partidosData));

        foreach ($lineas as $linea) {
            $datos = explode("|", trim($linea));
            if(count($datos) === 5) {
                $jornada = $datos[0];
                $local = trim($datos[1]);
                $visitante = trim($datos[2]);
                $resultado = trim($datos[3]);
                $fechaReal = trim($datos[4]);

                $idLocal = $equiposMap[$local] ?? null;
                $idVisitante = $equiposMap[$visitante] ?? null;

                if(!$idLocal || !$idVisitante) continue;

                // Si dice "vs", es partido futuro sin goles
                if($resultado === 'vs' || $resultado === '-') {
                    $gl = null;
                    $gv = null;
                } else {
                    $goles = explode("-", $resultado);
                    $gl = (int) $goles[0];
                    $gv = (int) $goles[1];
                }

                Game::create([
                    'jornada' => $jornada,
                    'local_team_id' => $idLocal,
                    'visitor_team_id' => $idVisitante,
                    'goles_local' => $gl,
                    'goles_visitante' => $gv,
                    'fecha_partido' => $fechaReal
                ]);

                // Las matemáticas solo se hacen si se ha jugado (hay goles)
                if ($gl !== null && $gv !== null) {
                    // Local
                    $standingsMath[$idLocal]['pj']++;
                    $standingsMath[$idLocal]['gf'] += $gl;
                    $standingsMath[$idLocal]['gc'] += $gv;
                    if($gl > $gv) { $standingsMath[$idLocal]['pg']++; $standingsMath[$idLocal]['pts'] += 3; } 
                    elseif($gl === $gv) { $standingsMath[$idLocal]['pe']++; $standingsMath[$idLocal]['pts'] += 1; } 
                    else { $standingsMath[$idLocal]['pp']++; }

                    // Visitante
                    $standingsMath[$idVisitante]['pj']++;
                    $standingsMath[$idVisitante]['gf'] += $gv;
                    $standingsMath[$idVisitante]['gc'] += $gl;
                    if($gv > $gl) { $standingsMath[$idVisitante]['pg']++; $standingsMath[$idVisitante]['pts'] += 3; } 
                    elseif($gv === $gl) { $standingsMath[$idVisitante]['pe']++; $standingsMath[$idVisitante]['pts'] += 1; } 
                    else { $standingsMath[$idVisitante]['pp']++; }
                }
            }
        }

        foreach ($standingsMath as $id => $stats) {
            Standing::create([
                'team_id' => $id,
                'posicion' => 0,
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