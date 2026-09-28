<?php

namespace App\Services;

class FacultyService
{
    /**
     * Complete faculty ledger mapped from SWE_Faculty_Initials_Designations_Fall2026.docx
     *
     * @var array<string, array{name: string, designation: string, status?: string}>
     */
    protected static array $facultyList = [
        'AAA' => ['name' => 'Md. Ashek -Al- Aziz', 'designation' => 'Assistant Professor'],
        'AAS' => ['name' => 'Aklema Akter Shorna', 'designation' => 'Lecturer'],
        'AB' => ['name' => 'Afsana Begum', 'designation' => 'Assistant Professor & Coordinator M.Sc'],
        'AE' => ['name' => 'Ms. Ashrafia Esha', 'designation' => 'Lecturer'],
        'AF' => ['name' => 'Mr. Arif Faisal', 'designation' => 'Lecturer'],
        'AH' => ['name' => 'Mr. Md. Anwar Hossen', 'designation' => 'Assistant Professor (Study Leave)'],
        'AHZ' => ['name' => 'Mr. Md. Abdul Hye Zebon', 'designation' => 'Lecturer'],
        'AR' => ['name' => 'Md. Ashikur Rahman', 'designation' => 'Lecturer'],
        'AS' => ['name' => 'Ms. Ayesha Siddika', 'designation' => 'Assistant Professor'],
        'DAT' => ['name' => 'Mr. Dewan Ahnaf Tazwar', 'designation' => 'Lecturer (Part time)'],
        'DDK' => ['name' => 'Mr. Dipta Dipayan Kar', 'designation' => 'Lecturer'],
        'FA' => ['name' => 'Mr. Faruk Ahmed', 'designation' => 'Lecturer'],
        'FC' => ['name' => 'Fayazunnesa Chowdhury', 'designation' => 'Lecturer'],
        'FE' => ['name' => 'Dr. Md. Fazla Elahe', 'designation' => 'Assistant Professor & Associate Head'],
        'FF' => ['name' => 'Mr. Fahim Faisal', 'designation' => 'Lecturer'],
        'FJT' => ['name' => 'Ms. Fatama Jannat Tisha', 'designation' => 'Lecturer'],
        'FM' => ['name' => 'Mr. Fahad Mahmud', 'designation' => 'Lecturer (Part time)'],
        'FRR' => ['name' => 'Mr. Fazla Rabby Raihan', 'designation' => 'Lecturer'],
        'FT' => ['name' => 'Mr. Farhan Tanvir', 'designation' => 'Lecturer'],
        'FTJ' => ['name' => 'Ms. Fatema Tuz Johora', 'designation' => 'Lecturer'],
        'FUA' => ['name' => 'Ms. Farah Ulfat Athoi', 'designation' => 'Lecturer'],
        'HBM' => ['name' => 'Ms. Humira Bentay Mahmud', 'designation' => 'Lecturer'],
        'HI' => ['name' => 'Md. Hafizul Imran', 'designation' => 'Assistant Professor'],
        'HT' => ['name' => 'Ms. Himika Tasnim', 'designation' => 'Lecturer'],
        'IAT' => ['name' => 'Mr. Izaz Ahmmed Tuhin', 'designation' => 'Lecturer'],
        'IM' => ['name' => 'Dr. Imran Mahmud', 'designation' => 'Professor & Head'],
        'IS' => ['name' => 'Ms. Ishrat Sultana', 'designation' => 'Lecturer (Senior Scale)'],
        'JA' => ['name' => 'Ms. Jinat Ara', 'designation' => 'Assistant Professor'],
        'JC' => ['name' => 'Ms. Joya Chakraborty', 'designation' => 'Lecturer'],
        'JIC' => ['name' => 'Jafrin Iqbal Chowdhury', 'designation' => 'Lecturer'],
        'KM' => ['name' => 'Mr. Khalid Masum', 'designation' => 'Lecturer'],
        'KRA' => ['name' => 'Mr. Kazi Rifat Ahmed', 'designation' => 'Lecturer (Senior Scale)'],
        'MAB' => ['name' => 'Ms. Maria Afrin Bindu', 'designation' => 'Lecturer'],
        'MAK' => ['name' => 'Dr. Md. Abdul Kader', 'designation' => 'Associate Professor'],
        'MBH' => ['name' => 'Ms. Maliha Bushra Hoque', 'designation' => 'Lecturer'],
        'MHS' => ['name' => 'Mr. Musabbir Hasan Sammak', 'designation' => 'Lecturer (Senior Scale)'],
        'MIR' => ['name' => 'Md Minhazul Isalm Royel', 'designation' => 'Lecturer'],
        'MIS' => ['name' => 'Ms. Mobassira Islam Shanta', 'designation' => 'Lecturer'],
        'MKH' => ['name' => 'Dr. Md. Kamrul Hossain', 'designation' => 'Associate Professor (Part time)'],
        'MKS' => ['name' => 'Mr. Md. Khaled Sohel', 'designation' => 'Assistant Professor'],
        'MMN' => ['name' => 'Mr. Mohseu Minhaj Niloy', 'designation' => 'Lecturer'],
        'MSH' => ['name' => 'Md. Sagar Hossen', 'designation' => 'Lecturer'],
        'MSM' => ['name' => 'Dr. Mohammad Sultan Mahmud', 'designation' => 'Assistant Professor'],
        'NAJ' => ['name' => 'Ms. Naomi Afrin Jalil', 'designation' => 'Lecturer'],
        'NML' => ['name' => 'Mr. Nasim Mahmud Likhon', 'designation' => 'Lecturer'],
        'PC' => ['name' => 'Mr. Partho Chanda', 'designation' => 'Lecturer'],
        'PS' => ['name' => 'Mr. Pranto Saha', 'designation' => 'Lecturer'],
        'QFF' => ['name' => 'Ms. Quazi Fariha Fairooz', 'designation' => 'Lecturer'],
        'RA' => ['name' => 'Mr. Md. Rashedul Alam', 'designation' => 'Lecturer'],
        'RH' => ['name' => 'Mr. Rony Hossain', 'designation' => 'Lecturer'],
        'RHH' => ['name' => 'Mr. Rashidul Hasan Hridoy', 'designation' => 'Lecturer'],
        'RI' => ['name' => 'Dr. Rubaiyat Islam', 'designation' => 'Associate Professor'],
        'RJM' => ['name' => 'Ms. Raiyan Janik Monir', 'designation' => 'Lecturer'],
        'RRB' => ['name' => 'Ms. Rubaiya Razin Bushra', 'designation' => 'Lecturer'],
        'RT' => ['name' => 'Ms. Rifa Tasfia', 'designation' => 'Lecturer'],
        'RUA' => ['name' => 'Mr. Rahat uddin Azad', 'designation' => 'Lecturer'],
        'SAM' => ['name' => 'Md. Sakib Ali Mazumder', 'designation' => 'Lecturer'],
        'SCS' => ['name' => 'Mr. Suprove Chandra Sarkar', 'designation' => 'Lecturer'],
        'SD' => ['name' => 'Ms. Sayone Dey', 'designation' => 'Lecturer'],
        'SIM' => ['name' => 'Mr. Samiul Islam Mugdho', 'designation' => 'Lecturer'],
        'SR' => ['name' => 'Mr. Md. Selim Reza', 'designation' => 'Assistant Professor'],
        'SS' => ['name' => 'Ms. Sadia Sultana', 'designation' => 'Lecturer'],
        'SSI' => ['name' => 'Mr. Syed Shams Islam', 'designation' => 'Lecturer'],
        'SST' => ['name' => 'Ms. Salmoon Shefath Tisha', 'designation' => 'Lecturer'],
        'ST' => ['name' => 'Sheikh Tonmoy', 'designation' => 'Lecturer'],
        'TBH' => ['name' => 'Tahmid Bin Haque', 'designation' => 'Lecturer'],
        'TBN' => ['name' => 'Md. Tashrif Bin Noor', 'designation' => 'Lecturer (Part time)'],
        'THZ' => ['name' => 'Mr. Tanvir Hasan Zoha', 'designation' => 'Associate Professor (Part time)'],
        'TM' => ['name' => 'Ms. Tahmina Meem', 'designation' => 'Lecturer'],
        'TR' => ['name' => 'Ms. Tasnim Rahman', 'designation' => 'Lecturer'],
        'TRT' => ['name' => 'Ms. Tapushe Rabaya Toma', 'designation' => 'Assistant Professor'],
        'TT' => ['name' => 'Ms. Tahsin Tasnim', 'designation' => 'Lecturer'],
        'UKD' => ['name' => 'Mr. Uttam Kumar Dey', 'designation' => 'Assistant Professor'],
        'WNI' => ['name' => 'Ms. Wasema Nooren Islam', 'designation' => 'Lecturer'],
        'ZT' => ['name' => 'Mr. Zarin Tusnim', 'designation' => 'Lecturer'],

        // Additional verified & candidate faculties from Section 2
        'ABS' => ['name' => 'Mr. Biraj Saha Aronya', 'designation' => 'Lecturer (Study Leave)'],
        'AK' => ['name' => 'Dr. Md. Abdul Kader / Mr. Aqib Khan', 'designation' => 'Associate Professor / Lecturer'],
        'AMR' => ['name' => 'Mr. S A M Matiur Rahman', 'designation' => 'Associate Professor (On Leave)'],
        'BB' => ['name' => 'Mr. Khalid Been Badruzzaman Biplob', 'designation' => 'Lecturer (Senior Scale)'],
        'BH' => ['name' => 'Ms. Maliha Bushra Hoque / Tahmid Bin Haque', 'designation' => 'Lecturer'],
        'CP' => ['name' => 'Mr. Bibhas Roy Chowdhury Piyas', 'designation' => 'Lecturer'],
        'FAJ' => ['name' => 'Md Fahmid-Ul-Alam Juboraj', 'designation' => 'Lecturer'],
        'FH' => ['name' => 'Dr. Md. Fokhray Hossain / Md. Fahad Hossain', 'designation' => 'Dean & Professor / Lecturer (Senior Scale)'],
        'JJS' => ['name' => 'Mr. Jul Jalal Al-Mamur Sayor', 'designation' => 'Lecturer'],
        'KBB' => ['name' => 'Mr. Khalid Been Badruzzaman Biplob', 'designation' => 'Lecturer (Senior Scale)'],
        'KI' => ['name' => 'Dr. Kamrul Islam Shahin / Mr. K. M. Shahriar Islam', 'designation' => 'Associate Professor / Lecturer'],
        'MA' => ['name' => 'Dr. Marzia Ahmed / Mr. Mahbubul Alam', 'designation' => 'Assistant Professor / Lecturer (Senior Scale)'],
        'MF' => ['name' => 'Dr. Md. Fazla Elahe / Dr. Mohammad Kamal Hossain', 'designation' => 'Assistant Professor & Associate Head'],
        'MH' => ['name' => 'Mr. Md. Mozammelul Haque / Md. Mahedi Hasan', 'designation' => 'Lecturer / Lecturer (Senior Scale)'],
        'MHM' => ['name' => 'Dr. S M Hasan Mahmud', 'designation' => 'Associate Professor (Study Leave)'],
        'MMH' => ['name' => 'Prof. Dr. Mohammad Mobarak Hossain', 'designation' => 'Professor'],
        'MR' => ['name' => 'Mr. Md. Mazbaur Rashid / Dr. Md Mahbubur Rahman', 'designation' => 'Lecturer / Lecturer (Senior Scale)'],
        'MRS' => ['name' => 'Mr. Md. Selim Reza / Mr. S.M Saidur Rahman', 'designation' => 'Assistant Professor / Lecturer'],
        'MSA' => ['name' => 'Mr. Md. Shohel Arman / Mr. Md. Suhag Ali', 'designation' => 'Assistant Professor / Lecturer (Senior Scale)'],
        'MSI' => ['name' => 'Dr. Md. Shafikul Islam / Md. Shahriar Islam', 'designation' => 'Assistant Professor / Lecturer'],
        'MSP' => ['name' => 'Md. Shahriar Parvez / Mr. A.H.M Shahariar Parvez', 'designation' => 'Lecturer / Associate Professor'],
        'MSS' => ['name' => 'Prof. Dr. A. H. M. Saifullah Sadi', 'designation' => 'Professor & Director, M.Sc in Cyber Security'],
        'NBA' => ['name' => 'Dr. Mohammed Nadir Bin Ali', 'designation' => 'Associate Professor (Part time)'],
        'SA' => ['name' => 'Mr. Md. Shohel Arman / Ms. Sumona Afroz', 'designation' => 'Assistant Professor / Lecturer (Part time)'],
        'SAS' => ['name' => 'Prof. Dr. A. H. M. Saifullah Sadi', 'designation' => 'Professor & Director, M.Sc in Cyber Security'],
        'SH' => ['name' => 'Ms. Shahina Haque / Mr. Shazzad Hossain', 'designation' => 'Assistant Professor / Lecturer'],
        'SI' => ['name' => 'Dr. Md. Shafikul Islam / Dr. Saiful Islam', 'designation' => 'Assistant Professor / Lecturer (Senior Scale)'],
        'SIK' => ['name' => 'Md. Saimim Islam Khan Hamim', 'designation' => 'Lecturer'],
        'SK' => ['name' => 'Md. Saimim Islam Khan Hamim', 'designation' => 'Lecturer'],
        'SMR' => ['name' => 'Mr. S A M Matiur Rahman / Mr. S.M Saidur Rahman', 'designation' => 'Associate Professor / Lecturer'],
        'SP' => ['name' => 'Md. Shahriar Parvez / Mr. A.H.M Shahariar Parvez', 'designation' => 'Lecturer / Associate Professor'],
        'SSA' => ['name' => 'Prof. Dr. A. H. M. Saifullah Sadi', 'designation' => 'Professor & Director, M.Sc in Cyber Security'],
        'SSR' => ['name' => 'Mr. Sheikh Shah Mohammad Motiur Rahman', 'designation' => 'Lecturer (Senior Scale) (On Leave)'],
    ];

    /**
     * Get details for a teacher initial.
     *
     * @return array{name: string, designation: string, initial: string}
     */
    public static function getFaculty(string $initial): array
    {
        $clean = strtoupper(trim($initial));

        if (isset(self::$facultyList[$clean])) {
            return array_merge(self::$facultyList[$clean], ['initial' => $clean]);
        }

        if ($clean === 'TBA' || empty($clean)) {
            return [
                'initial' => $clean ?: 'TBA',
                'name' => 'To Be Announced (TBA)',
                'designation' => 'Department Faculty',
            ];
        }

        return [
            'initial' => $clean,
            'name' => "Faculty ({$clean})",
            'designation' => 'SWE Department Faculty',
        ];
    }

    /**
     * Get full name string.
     */
    public static function getFullName(string $initial): string
    {
        return self::getFaculty($initial)['name'];
    }

    /**
     * Get designation string.
     */
    public static function getDesignation(string $initial): string
    {
        return self::getFaculty($initial)['designation'];
    }

    /**
     * Get all faculty members sorted.
     *
     * @return array<string, array{name: string, designation: string, initial: string}>
     */
    public static function all(): array
    {
        $all = [];
        foreach (self::$facultyList as $initial => $info) {
            $all[$initial] = array_merge($info, ['initial' => $initial]);
        }

        ksort($all);

        return $all;
    }

    /**
     * Search faculty by initial or name.
     */
    public static function search(string $query): array
    {
        $q = strtolower(trim($query));
        if (empty($q)) {
            return self::all();
        }

        $results = [];
        foreach (self::$facultyList as $initial => $info) {
            if (
                str_contains(strtolower($initial), $q) ||
                str_contains(strtolower($info['name']), $q) ||
                str_contains(strtolower($info['designation']), $q)
            ) {
                $results[$initial] = array_merge($info, ['initial' => $initial]);
            }
        }

        return $results;
    }
}
