<?php
/*
* Level.php - Displays teaming, pvp and mission levels.
*
* BeBot - An Anarchy Online & Age of Conan Chat Automaton
* Copyright (C) 2004 Jonas Jax
* Copyright (C) 2005-2020 J-Soft and the BeBot development team.
*
* Developed by:
* - Alreadythere (RK2)
* - Blondengy (RK1)
* - Blueeagl3 (RK1)
* - Glarawyn (RK1)
* - Khalem (RK1)
* - Naturalistic (RK1)
* - Temar (RK1)
*
* See Credits file for all acknowledgements.
*
*  This program is free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; version 2 of the License only.
*
*  This program is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  You should have received a copy of the GNU General Public License
*  along with this program; if not, write to the Free Software
*  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307
*  USA
*/
// Formulas Created by Temar.
$level = new Level($bot);
class Level extends BaseActiveModule
{

    function __construct(&$bot)
    {
        parent::__construct($bot, get_class($this));
        $this->register_command('all', 'level', 'GUEST');
        $this->register_command('all', 'mission', 'GUEST');
        $this->help['description'] = 'Displayes teaming, pvp and mission levels.';
        $this->help['command']['level <level>'] = "Shows team and pvp ranges for a given <level> and which QL missions that level can roll";
        $this->help['command']['mission <level>'] = "Shows Levels that can Roll the given Mission <level>";
        $this->help['notes'] = "<pre>lvl is a synonym for <pre>level.<br>";
        $this->help['notes'] = "<pre>mish is a synonym for <pre>mission.<br>";
        $this->help['notes'] .= "Team and pvp levels has been known to be off especially for low levels.";
        $this->register_alias("level", "lvl");
        $this->register_alias("mission", "mish");
        $this->make_cache();
    }


    function make_cache()
    {
        $this->xplevel = array(
            1 => 1450,
            2 => 2600,
            3 => 3100,
            4 => 4000,
            5 => 4500,
            6 => 5000,
            7 => 5500,
            8 => 6000,
            9 => 6500,
            10 => 7000,
            11 => 7700,
            12 => 8300,
            13 => 8900,
            14 => 9600,
            15 => 10400,
            16 => 11000,
            17 => 11900,
            18 => 12700,
            19 => 13700,
            20 => 15400,
            21 => 16400,
            22 => 17600,
            23 => 18800,
            24 => 20100,
            25 => 21500,
            26 => 22900,
            27 => 24500,
            28 => 26100,
            29 => 27800,
            30 => 30900,
            31 => 33000,
            32 => 35100,
            33 => 37400,
            34 => 39900,
            35 => 42400,
            36 => 45100,
            37 => 47900,
            38 => 50900,
            39 => 54000,
            40 => 57400,
            41 => 60900,
            42 => 64500,
            43 => 68400,
            44 => 76400,
            45 => 81000,
            46 => 85900,
            47 => 91000,
            48 => 96400,
            49 => 101900,
            50 => 108000,
            51 => 114300,
            52 => 120800,
            53 => 127700,
            54 => 135000,
            55 => 142600,
            56 => 150700,
            57 => 161900,
            58 => 167800,
            59 => 177100,
            60 => 203500,
            61 => 214700,
            62 => 226700,
            63 => 239100,
            64 => 251900,
            65 => 265700,
            66 => 280000,
            67 => 294800,
            68 => 310600,
            69 => 327000,
            70 => 344400,
            71 => 362300,
            72 => 381100,
            73 => 401000,
            74 => 421600,
            75 => 443300,
            76 => 508100,
            77 => 534200,
            78 => 561600,
            79 => 590200,
            80 => 620000,
            81 => 651000,
            82 => 683700,
            83 => 717900,
            84 => 753500,
            85 => 790800,
            86 => 829400,
            87 => 870000,
            88 => 912600,
            89 => 956800,
            90 => 1003000,
            91 => 1051300,
            92 => 1101500,
            93 => 1153900,
            94 => 1208800,
            95 => 1266000,
            96 => 1325500,
            97 => 1387700,
            98 => 1452300,
            99 => 1519900,
            100 => 1590300,
            101 => 1663500,
            102 => 1739900,
            103 => 1819600,
            104 => 1902200,
            105 => 1988900,
            106 => 2078600,
            107 => 2172100,
            108 => 2269800,
            109 => 2371100,
            110 => 2476600,
            111 => 2586600,
            112 => 2701000,
            113 => 2819800,
            114 => 2943600,
            115 => 3072400,
            116 => 3205800,
            117 => 3345200,
            118 => 3489700,
            119 => 3640200,
            120 => 3796500,
            121 => 3958900,
            122 => 4128000,
            123 => 4303400,
            124 => 4485700,
            125 => 4674800,
            126 => 4871700,
            127 => 5075700,
            128 => 5288100,
            129 => 5508200,
            130 => 5736800,
            131 => 5974600,
            132 => 6220700,
            133 => 6474500,
            134 => 6742200,
            135 => 7017500,
            136 => 7303700,
            137 => 7600100,
            138 => 7907600,
            139 => 8227000,
            140 => 8557700,
            141 => 8901000,
            142 => 9256800,
            143 => 9625800,
            144 => 10008600,
            145 => 10405300,
            146 => 10816600,
            147 => 11242500,
            148 => 11684300,
            149 => 12141900,
            150 => 12616200,
            151 => 13107200,
            152 => 13616100,
            153 => 14143600,
            154 => 14689700,
            155 => 15255300,
            156 => 15841000,
            157 => 16447900,
            158 => 17075800,
            159 => 17725900,
            160 => 18399400,
            161 => 19096100,
            162 => 19817500,
            163 => 20564100,
            164 => 21336600,
            165 => 22136100,
            166 => 22963600,
            167 => 23819700,
            168 => 24705200,
            169 => 25621100,
            170 => 26569000,
            171 => 27548800,
            172 => 28562900,
            173 => 29611100,
            174 => 30695300,
            175 => 31816300,
            176 => 32975100,
            177 => 34173500,
            178 => 35412500,
            179 => 36692500,
            180 => 38016500,
            181 => 39484400,
            182 => 40797700,
            183 => 42258500,
            184 => 43768300,
            185 => 45328100,
            186 => 46939900,
            187 => 48604900,
            188 => 50324600,
            189 => 52101200,
            190 => 53936300,
            191 => 55831600,
            192 => 57788700,
            193 => 59810000,
            194 => 61897000,
            195 => 64052200,
            196 => 66277200,
            197 => 68574400,
            198 => 70945700,
            199 => 73393900,
            200 => 80000,
            201 => 96000,
            202 => 115200,
            203 => 138240,
            204 => 165888,
            205 => 199066,
            206 => 238879,
            207 => 286654,
            208 => 343985,
            209 => 412782,
            210 => 495339,
            211 => 594407,
            212 => 713288,
            213 => 855946,
            214 => 1027135,
            215 => 1232562,
            216 => 1479074,
            217 => 1774889,
            218 => 2129867,
            219 => 2555840,
            220 => 0
        );
        $this->mission = array(
            1 => "1 2",
            2 => "2 3 4",
            3 => "2 4 5",
            4 => "3 4 5 6 7",
            5 => "3 4 5 6 7 8",
            6 => "4 5 6 7 8 9",
            7 => "4 5 6 7 8 9 10 11",
            8 => "5 7 8 9 10 11 12",
            9 => "6 7 8 9 10 11 12 13 14",
            10 => "6 7 8 9 10 12 13 14 15",
            11 => "9 10 11 13 14 15 16 17",
            12 => "7 8 10 11 12 14 15 15 16 17 18",
            13 => "9 10 11 12 13 15 16 17 18 19",
            14 => "8 11 12 13 14 16 17 18 19 20 21",
            15 => "10 12 13 14 15 17 18 19 20 21 22",
            16 => "9 11 13 14 15 16 18 19 20 21 22 23 24",
            17 => "16 17 19 20 21 22 23 25",
            18 => "10 12 14 15 17 18 20 21 22 23 24 25 26 27",
            19 => "11 13 15 16 18 19 22 23 24 26 28",
            20 => "16 17 19 20 23 24 25 26 27 29",
            21 => "12 14 18 21 24 25 27 28 29 30 31",
            22 => "13 15 17 19 20 22 25 26 27 28 30 32",
            23 => "18 21 23 26 28 29 31 33 34",
            24 => "14 16 19 20 22 24 27 29 30 31 32 33 35",
            25 => "17 21 23 25 28 30 32 34 36 37",
            26 => "15 20 22 24 26 29 31 33 35 38",
            27 => "18 21 23 25 27 30 31 32 34 36 37 39",
            28 => "16 19 22 24 26 28 32 33 34 35 36 38 40 41",
            29 => "23 27 29 33 35 37 39 42",
            30 => "17 20 25 28 30 34 36 38 40 41 43 44",
            31 => "21 24 26 29 31 35 37 39 42 45",
            32 => "18 25 27 32 36 38 40 41 43 46 47",
            33 => "22 26 28 30 33 37 39 42 44 45 48",
            34 => "19 23 29 31 34 38 40 41 43 46 49",
            35 => "27 32 35 39 42 44 47 50 51",
            36 => "20 24 28 30 33 36 40 41 43 45 46 48 49 52",
            37 => "21 25 29 31 34 37 42 44 47 50 53 54",
            38 => "22 32 35 38 43 45 48 51 55",
            39 => "26 30 33 36 39 44 46 47 49 52 53 56 57",
            40 => "27 31 34 37 40 45 48 50 51 54 58",
            41 => "23 32 38 41 46 49 52 55 59",
            42 => "24 28 33 35 39 42 47 50 53 56 57 60 61",
            43 => "29 36 43 48 51 54 58 62",
            44 => "25 34 37 40 44 49 52 55 56 59 63 64",
            45 => "30 35 38 41 45 50 51 53 54 57 60 61 65",
            46 => "26 31 36 39 42 46 52 55 58 62 66 67",
            47 => "43 47 53 56 59 63 68",
            48 => "27 32 37 40 44 48 54 57 60 61 64 65 69",
            49 => "33 38 41 45 49 55 58 62 66 70 71",
            50 => "28 39 42 46 50 56 59 63 67 72",
            51 => "29 34 43 47 51 57 60 61 64 68 69 73 74",
            52 => "35 40 44 48 52 58 62 65 66 70 75",
            53 => "30 41 49 53 59 63 67 71 76 77",
            54 => "36 42 45 54 60 61 64 68 72 73 78",
            55 => "31 37 43 46 50 55 62 65 69 74 79",
            56 => "32 47 51 56 63 66 67 70 71 75 80 81",
            57 => "38 44 48 52 57 64 68 72 76 77 82",
            58 => "33 39 45 49 53 58 65 69 73 78 83 84",
            59 => "46 54 59 66 70 74 79 85",
            60 => "34 40 50 55 60 67 71 75 76 77 80 81 86 87",
            61 => "41 47 51 56 61 68 72 82 88",
            62 => "35 48 52 57 62 69 73 74 78 83 89",
            63 => "42 49 53 58 63 70 71 75 79 84 85 90 91",
            64 => "36 43 54 59 64 72 76 77 80 81 86 92",
            65 => "50 65 73 82 87 93 94",
            66 => "37 44 51 55 60 66 74 78 83 88 89 95",
            67 => "45 52 56 61 67 75 79 84 90 96 97",
            68 => "38 53 57 62 68 76 80 81 85 86 91 98",
            69 => "39 46 58 63 69 77 82 87 92 93 99",
            70 => "47 54 59 64 70 78 83 88 94 100 101",
            71 => "40 55 65 71 79 84 89 95 102",
            72 => "48 56 60 66 72 80 81 85 90 91 96 97 103 104",
            73 => "41 49 61 67 73 82 86 87 92 98 105",
            74 => "57 62 68 74 83 88 93 99 106 107",
            75 => "42 50 58 63 69 75 84 89 94 100 101 108",
            76 => "51 59 64 76 85 90 95 96 102 109",
            77 => "43 70 77 86 91 97 103 110 111",
            78 => "44 52 60 65 71 78 87 92 98 104 105 112",
            79 => "53 61 66 72 79 88 93 94 99 106 113 114",
            80 => "45 62 67 73 80 89 95 100 101 107 115",
            81 => "54 63 68 74 81 90 91 96 102 108 109 116 117",
            82 => "46 55 69 75 82 92 97 103 110 118",
            83 => "64 76 77 83 93 98 104 111 119",
            84 => "47 56 65 70 84 94 99 105 106 112 113 120 121",
            85 => "48 57 66 71 78 85 95 100 101 107 114 122",
            86 => "72 79 86 96 102 108 115 123 124",
            87 => "49 58 67 73 87 97 103 109 116 117 125",
            88 => "59 68 74 80 88 98 104 110 111 118 126 127",
            89 => "50 69 81 89 99 105 112 119 128",
            90 => "60 75 82 90 100 101 106 107 113 120 121 129",
            91 => "51 61 70 76 77 83 91 102 108 114 122 130 131",
            92 => "52 71 84 92 103 109 115 116 123 132",
            93 => "62 72 78 85 93 104 110 117 124 125 133 134",
            94 => "63 73 79 86 94 105 111 118 126 135",
            95 => "53 87 95 106 112 119 127 136 137",
            96 => "64 74 80 88 96 107 113 114 120 121 128 129 138",
            97 => "54 65 75 81 89 97 108 115 122 130 139",
            98 => "55 76 82 98 109 116 123 131 140 141",
            99 => "66 83 90 99 110 111 117 124 132 133 142",
            100 => "56 67 77 84 91 100 112 118 125 126 134 143 144",
            101 => "78 92 101 113 119 127 135 145",
            102 => "57 68 79 85 93 102 114 120 121 128 136 137 146 147",
            103 => "58 69 86 94 103 115 122 129 138 148",
            104 => "80 87 95 104 116 123 130 131 139 149",
            105 => "59 70 81 88 96 105 117 124 132 140 141 150 151",
            106 => "71 82 89 97 106 118 125 133 142 152",
            107 => "83 98 107 119 126 127 134 143 153 154",
            108 => "60 72 90 99 108 120 121 128 135 136 144 145 155",
            109 => "61 73 84 91 109 122 129 137 146 156 157",
            110 => "62 85 92 100 110 123 130 138 147 158",
            111 => "74 86 93 101 111 124 131 139 148 149 159",
            112 => "63 75 94 102 112 125 132 140 141 150 160 161",
            113 => "87 103 113 126 133 134 142 151 162 163",
            114 => "64 76 88 95 104 114 127 135 143 152 153 164",
            115 => "77 89 96 105 115 128 136 144 154 165",
            116 => "65 97 106 116 129 137 145 146 155 166 167",
            117 => "78 90 98 107 117 130 131 138 147 156 157 168",
            118 => "66 79 91 99 108 118 132 139 148 169",
            119 => "92 109 119 133 140 141 149 158 159 170 171",
            120 => "67 80 93 100 120 134 142 150 151 160 161 172",
            121 => "68 81 101 110 121 135 143 152 162 173 174",
            122 => "94 102 111 112 122 136 144 153 163 175",
            123 => "69 82 95 103 123 137 145 154 164 165 176 177",
            124 => "83 96 104 113 124 138 146 147 155 156 166 168 178",
            125 => "70 114 125 139 148 157 167 179",
            126 => "84 97 105 115 126 140 141 149 158 169 180 181",
            127 => "71 85 98 106 116 127 142 150 159 170 182",
            128 => "72 99 107 117 128 143 151 160 161 171 183 184",
            129 => "86 108 118 129 144 152 162 172 173 185",
            130 => "73 87 100 109 119 130 145 153 154 163 174 186 187",
            131 => "101 131 146 155 164 175 188",
            132 => "74 88 102 110 120 132 147 156 165 166 176 177 189",
            133 => "89 103 111 121 133 148 157 167 178 190 191",
            134 => "75 112 122 134 149 158 168 179 192",
            135 => "76 90 104 113 123 135 150 151 159 169 180 181 193 194",
            136 => "91 105 114 124 136 152 160 161 170 171 182 195",
            137 => "77 106 125 137 153 162 172 183 196 197",
            138 => "78 92 115 126 138 154 163 173 184 185 198",
            139 => "79 93 107 116 127 139 155 164 174 186 199",
            140 => "108 117 128 140 156 165 175 176 187 200 201",
            141 => "94 109 118 129 141 157 166 167 177 188 189 202",
            142 => "95 119 142 158 168 178 190 203 204",
            143 => "110 130 143 159 169 179 191 205",
            144 => "80 96 111 120 131 144 160 161 170 180 181 192 193 206 207",
            145 => "81 97 112 121 132 145 162 171 182 194 208",
            146 => "82 113 122 133 146 163 172 183 195 209",
            147 => "98 123 134 147 164 173 174 184 196 197 210 211",
            148 => "83 99 114 124 135 148 165 175 185 186 198 212",
            149 => "84 115 136 149 166 176 187 199 213 214",
            150 => "100 116 125 137 150 167 177 188 200 201 215",
            151 => "85 101 126 138 151 168 178 189 202 216 217",
            152 => "117 127 139 152 169 179 190 191 203 218",
            153 => "102 118 128 153 170 171 180 181 192 204 205 219",
            154 => "86 103 119 129 140 154 172 182 193 206 220",
            155 => "87 141 155 173 183 194 207",
            156 => "104 120 130 142 156 174 184 195 196 208 209",
            157 => "88 105 121 131 143 157 175 185 197 210",
            158 => "122 132 144 158 176 186 187 198 211",
            159 => "89 106 123 133 145 159 177 188 199 212 213",
            160 => "107 134 146 160 178 189 200 201 214",
            161 => "90 124 147 161 179 190 202 215",
            162 => "108 125 135 148 162 180 181 191 203 216 217",
            163 => "91 109 126 136 149 163 182 192 204 218",
            164 => "92 137 164 183 193 194 205 206 219",
            165 => "110 127 138 150 165 184 195 207 220",
            166 => "93 111 128 139 151 166 185 196 208",
            167 => "129 152 167 186 197 209",
            168 => "94 112 140 153 168 187 198 210 211",
            169 => "113 130 141 154 169 188 199 212",
            170 => "95 131 142 155 170 189 200 201 213",
            171 => "96 114 132 143 156 171 190 191 202 214",
            172 => "115 133 144 157 172 192 203 215 216",
            173 => "97 158 173 193 204 217",
            174 => "116 134 145 159 174 194 205 218",
            175 => "98 117 135 146 175 195 206 207 219",
            176 => "136 147 160 176 196 208 220",
            177 => "99 118 148 161 177 197 209",
            178 => "119 137 149 162 178 198 210",
            179 => "100 138 163 179 199 211",
            180 => "120 139 150 164 180 200 201 212",
            181 => "121 151 165 181 202 213 214",
            182 => "140 152 166 182 203 215",
            183 => "122 141 153 167 183 204 216",
            184 => "101 123 142 154 168 184 205 217",
            185 => "103 143 169 185 206 218",
            186 => "102 124 155 186 207 219",
            187 => "104 125 144 156 170 187 208 220",
            188 => "105 145 157 171 188 209",
            189 => "106 126 146 158 172 189 210 211",
            190 => "127 159 173 190 212",
            191 => "107 147 174 191 213",
            192 => "128 148 160 175 192 214",
            193 => "108 129 149 161 176 193 215",
            194 => "162 177 194 216",
            195 => "109 130 150 163 178 195 217",
            196 => "131 151 164 179 196 218",
            197 => "110 152 197 219",
            198 => "111 132 153 165 180 198 220",
            199 => "133 166 181 199",
            200 => "112 154 167 182 200",
            201 => "134 155 168 183 201",
            202 => "113 135 156 169 184 202",
            203 => "185 203",
            204 => "114 136 157 170 186 204",
            205 => "137 158 171 172 187 205",
            206 => "115 159 188 206",
            207 => "138 173 189 207",
            208 => "116 139 160 174 208",
            209 => "161 190 209",
            210 => "117 140 162 175 191 210",
            211 => "118 141 163 176 192 211",
            212 => "142 177 193 212",
            213 => "164 178 194 213",
            214 => "119 143 165 179 195 214",
            215 => "120 166 196 215",
            216 => "144 180 197 216",
            217 => "121 145 167 181 198 217",
            218 => "122 168 182 199 218",
            219 => "146 169 183 219",
            220 => "123 147 170 184 200 220",
            221 => "201",
            222 => "124 148 171 185 202",
            223 => "149 172 186 203",
            224 => "125 173 187 204",
            225 => "126 127 150 188 205",
            226 => "128 151 174 189 206",
            227 => "129 175 207",
            228 => "152 176 190 208 209",
            229 => "153 191",
            230 => "177 192",
            231 => "154 178 193 210",
            232 => "130 155 179 194 211",
            233 => "212",
            234 => "156 180 195 213",
            235 => "131 157 181 196 214",
            236 => "132 182 197 215",
            237 => "133 158 183 198 216",
            238 => "134 159 199 217",
            239 => "135 184 218",
            240 => "160 185 200 219",
            241 => "161 186 201",
            242 => "202 220",
            243 => "136 162 187 203",
            244 => "163 188 204",
            245 => "137 189",
            246 => "138 164 205",
            247 => "165 190 206",
            248 => "139 191 207",
            249 => "166 192 208",
            250 => "140 141 142 143 144 145 146 147 148 149 150 151 152 153 154 155 156 157 158 159 160 161 162 163 164 165 166 167 167 168 169 170 170 171 172 173 174 175 176 177 178 179 180 181 182 183 184 185 186 187 188 189 190 191 192 193 194 194 195 196 197 198 199 200 201 202 203 204 205 206 207 208 209 210 211 212 213 214 215 216 217 218 219 220"
        );
    }


    function command_handler($name, $msg, $origin)
    {
        $vars = explode(' ', strtolower($msg));
        $command = $vars[0];
        switch ($command) {
            case 'level':
                return $this->get_level($vars[1]);
            case 'mission':
                return $this->get_mish($vars[1]);
            default:
                return "Broken plugin, received unhandled command: $command";
        }
        return false;
    }


    function get_level($lvl)
    {
        if (($lvl > 220) || ($lvl < 1)) {
            Return "Please choose a number between 1 and 220";
        }
        if ($lvl < 200) {
            $xp = " XP";
        } else {
            $xp = " SK";
        }
        $lvllow = floor(($lvl * 0.7226)) + 1;
        $lvlhigh = floor($lvl * 1.3839);
        if ($lvlhigh > 220) {
            $lvlhigh = 220;
        }
        if ($lvl <= 5) {
            $pvplow = 1;
        } else {
            $pvplow = round($lvl * 0.8) - 1;
        }
        if ($lvl <= 2) {
            $pvphigh = 5;
        } else {
            $pvphigh = $lvl + (ceil($lvl / 4)) + 1;
        }
        if ($pvphigh > 220) {
            $pvphigh = 220;
        }
        $mishpercs = array(
            0.70,
            0.75,
            0.80,
            0.85,
            0.90,
            1,
            1.10,
            1.20,
            1.30,
            1.50,
            1.79
        );
        foreach ($mishpercs as $mishperc) {
            $mishlvl = floor($lvl * $mishperc);
            if ($mishlvl < 1) {
                $mishlvl = 1;
            }
            if ($mishlvl > 250) {
                $mishlvl = 250;
            }
            $mish[$mishlvl] = "";
        }
		$mishlist = "";
        foreach ($mish as $key => $value) {
            $mishlist .= " " . $key;
        }
        $return = "L <font color=#FFFF00>" . $lvl . "</font>: team " . $lvllow . "-" . $lvlhigh . "  |  PvP " . $pvplow . "-" . $pvphigh . "  |  " . $this->xplevel[$lvl] . $xp
            . "  |  missions<font color=#66CCFF>" . $mishlist . "</font>";
        Return ($return);
    }


    function get_mish($mish)
    {
        if (($mish > 250) || ($mish < 1)) {
            Return "Please choose a number between 1 and 250";
        }
        $return = "QL <font color=#ffff00>" . $mish . "</font> missions maybe from these level players (+/- 1):<font color=#69c5ff> " . $this->mission[$mish] . "</font>";
        Return ($return);
    }
}

?>
