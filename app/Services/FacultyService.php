<?php

namespace App\Services;

class FacultyService
{
    /**
     * Faculty members on approved Study Leave or Leave.
     * Excluded from active faculty directories per academic administration.
     *
     * @var array<string, array{name: string, designation: string, status: string}>
     */
    protected static array $onLeaveList = [
        'AH' => ['name' => 'Mr. Md. Anwar Hossen', 'designation' => 'Assistant Professor (Study Leave)', 'status' => 'Study Leave'],
        'ABS' => ['name' => 'Mr. Biraj Saha Aronya', 'designation' => 'Lecturer (Study Leave)', 'status' => 'Study Leave'],
        'AMR' => ['name' => 'Mr. S A M Matiur Rahman', 'designation' => 'Associate Professor (On Leave)', 'status' => 'On Leave'],
        'MHM' => ['name' => 'Dr. S M Hasan Mahmud', 'designation' => 'Associate Professor (Study Leave)', 'status' => 'Study Leave'],
    ];

    /**
     * Active Department Faculty and Instructors mapped to exact verified initials and designations.
     *
     * @var array<string, array{name: string, designation: string}>
     */
    protected static array $facultyList = [
        // Core Department of Software Engineering Faculty
        'AAA' => ['name' => 'Md. Ashek -Al- Aziz', 'designation' => 'Assistant Professor'],
        'AAAS' => ['name' => 'Md. Ashek -Al- Aziz', 'designation' => 'Assistant Professor'],
        'AAS' => ['name' => 'Aklema Akter Shorna', 'designation' => 'Lecturer'],
        'AAZ' => ['name' => 'Md. Ashek -Al- Aziz', 'designation' => 'Assistant Professor'],
        'AB' => ['name' => 'Afsana Begum', 'designation' => 'Assistant Professor & Coordinator M.Sc'],
        'AE' => ['name' => 'Ms. Ashrafia Esha', 'designation' => 'Lecturer'],
        'AF' => ['name' => 'Mr. Arif Faisal', 'designation' => 'Lecturer'],
        'AHZ' => ['name' => 'Mr. Md. Abdul Hye Zebon', 'designation' => 'Lecturer'],
        'AK' => ['name' => 'Mr. Aqib Khan', 'designation' => 'Lecturer'],
        'AR' => ['name' => 'Md. Ashikur Rahman', 'designation' => 'Lecturer'],
        'AS' => ['name' => 'Ms. Ayesha Siddika', 'designation' => 'Assistant Professor'],
        'ATMF' => ['name' => 'Mr. A.T.M. Fokhruzzaman', 'designation' => 'Assistant Professor'],
        'AUA' => ['name' => 'Ms. Afsana Begum', 'designation' => 'Assistant Professor & Coordinator M.Sc'],
        'BB' => ['name' => 'Mr. Khalid Been Badruzzaman Biplob', 'designation' => 'Lecturer (Senior Scale)'],
        'BH' => ['name' => 'Tahmid Bin Haque', 'designation' => 'Lecturer'],
        'CP' => ['name' => 'Mr. Bibhas Roy Chowdhury Piyas', 'designation' => 'Lecturer'],
        'DAT' => ['name' => 'Mr. Dewan Ahnaf Tazwar', 'designation' => 'Lecturer (Part time)'],
        'DDK' => ['name' => 'Mr. Dipta Dipayan Kar', 'designation' => 'Lecturer'],
        'DEH' => ['name' => 'Dr. Md. Enamul Haque', 'designation' => 'Associate Professor'],
        'DKS' => ['name' => 'Mr. Dipta Dipayan Kar', 'designation' => 'Lecturer'],
        'DMH' => ['name' => 'Dr. Md. Hasanuzzaman', 'designation' => 'Assistant Professor'],
        'DMMK' => ['name' => 'Dr. Md. Mizanur Rahman Khan', 'designation' => 'Associate Professor'],
        'DMR' => ['name' => 'Dr. Md. Rezaul Karim', 'designation' => 'Associate Professor'],
        'DSA' => ['name' => 'Dr. Sourav Paul', 'designation' => 'Assistant Professor'],
        'DSI' => ['name' => 'Dr. Saiful Islam', 'designation' => 'Associate Professor'],
        'DSM' => ['name' => 'Dr. Mohammad Sultan Mahmud', 'designation' => 'Assistant Professor'],
        'FA' => ['name' => 'Mr. Faruk Ahmed', 'designation' => 'Lecturer'],
        'FAJ' => ['name' => 'Md Fahmid-Ul-Alam Juboraj', 'designation' => 'Lecturer'],
        'FC' => ['name' => 'Fayazunnesa Chowdhury', 'designation' => 'Lecturer'],
        'FE' => ['name' => 'Dr. Md. Fazla Elahe', 'designation' => 'Assistant Professor & Associate Head'],
        'FF' => ['name' => 'Mr. Fahim Faisal', 'designation' => 'Lecturer'],
        'FH' => ['name' => 'Dr. Md. Fokhray Hossain', 'designation' => 'Dean & Professor'],
        'FJT' => ['name' => 'Ms. Fatama Jannat Tisha', 'designation' => 'Lecturer'],
        'FM' => ['name' => 'Mr. Fahad Mahmud', 'designation' => 'Lecturer (Part time)'],
        'FRR' => ['name' => 'Mr. Fazla Rabby Raihan', 'designation' => 'Lecturer'],
        'FT' => ['name' => 'Mr. Farhan Tanvir', 'designation' => 'Lecturer'],
        'FTJ' => ['name' => 'Ms. Fatema Tuz Johora', 'designation' => 'Lecturer'],
        'FUA' => ['name' => 'Ms. Farah Ulfat Athoi', 'designation' => 'Lecturer'],
        'HBM' => ['name' => 'Ms. Humira Bentay Mahmud', 'designation' => 'Lecturer'],
        'HI' => ['name' => 'Md. Hafizul Imran', 'designation' => 'Assistant Professor'],
        'HT' => ['name' => 'Ms. Himika Tasnim', 'designation' => 'Lecturer'],
        'HTS' => ['name' => 'Ms. Himika Tasnim', 'designation' => 'Lecturer'],
        'IAT' => ['name' => 'Mr. Izaz Ahmmed Tuhin', 'designation' => 'Lecturer'],
        'IM' => ['name' => 'Dr. Imran Mahmud', 'designation' => 'Professor & Head'],
        'INB' => ['name' => 'Ms. Israt Naeem Binte', 'designation' => 'Lecturer'],
        'IS' => ['name' => 'Ms. Ishrat Sultana', 'designation' => 'Lecturer (Senior Scale)'],
        'JA' => ['name' => 'Ms. Jinat Ara', 'designation' => 'Assistant Professor'],
        'JAL' => ['name' => 'Mr. Joy Alam', 'designation' => 'Lecturer'],
        'JC' => ['name' => 'Ms. Joya Chakraborty', 'designation' => 'Lecturer'],
        'JIC' => ['name' => 'Jafrin Iqbal Chowdhury', 'designation' => 'Lecturer'],
        'JJS' => ['name' => 'Mr. Jul Jalal Al-Mamur Sayor', 'designation' => 'Lecturer'],
        'JK' => ['name' => 'Ms. Jinat Ara', 'designation' => 'Assistant Professor'],
        'KBB' => ['name' => 'Mr. Khalid Been Badruzzaman Biplob', 'designation' => 'Lecturer (Senior Scale)'],
        'KI' => ['name' => 'Dr. Kamrul Islam Shahin', 'designation' => 'Associate Professor'],
        'KM' => ['name' => 'Mr. Khalid Masum', 'designation' => 'Lecturer'],
        'KRA' => ['name' => 'Mr. Kazi Rifat Ahmed', 'designation' => 'Lecturer (Senior Scale)'],
        'KUS' => ['name' => 'Mr. Kamrul Hasan', 'designation' => 'Lecturer'],
        'MA' => ['name' => 'Mr. Mahbubul Alam', 'designation' => 'Lecturer (Senior Scale)'],
        'MAB' => ['name' => 'Ms. Maria Afrin Bindu', 'designation' => 'Lecturer'],
        'MAK' => ['name' => 'Dr. Md. Abdul Kader', 'designation' => 'Associate Professor'],
        'MAUA' => ['name' => 'Mr. Md. Asaduzzaman', 'designation' => 'Lecturer'],
        'MBH' => ['name' => 'Ms. Maliha Bushra Hoque', 'designation' => 'Lecturer'],
        'MF' => ['name' => 'Dr. Mohammad Kamal Hossain Foraji', 'designation' => 'Assistant Professor'],
        'MH' => ['name' => 'Md. Mahedi Hasan', 'designation' => 'Lecturer (Senior Scale)'],
        'MHN' => ['name' => 'Mr. Md. Hafizur Rahman', 'designation' => 'Lecturer'],
        'MHS' => ['name' => 'Mr. Musabbir Hasan Sammak', 'designation' => 'Lecturer (Senior Scale)'],
        'MIR' => ['name' => 'Md Minhazul Isalm Royel', 'designation' => 'Lecturer'],
        'MIS' => ['name' => 'Ms. Mobassira Islam Shanta', 'designation' => 'Lecturer'],
        'MKH' => ['name' => 'Dr. Md. Kamrul Hossain', 'designation' => 'Associate Professor (Part time)'],
        'MKS' => ['name' => 'Mr. Md. Khaled Sohel', 'designation' => 'Assistant Professor'],
        'MMH' => ['name' => 'Prof. Dr. Mohammad Mobarak Hossain', 'designation' => 'Professor'],
        'MMN' => ['name' => 'Mr. Mohseu Minhaj Niloy', 'designation' => 'Lecturer'],
        'MMSI' => ['name' => 'Md Syeedul Islam', 'designation' => 'Lecturer'],
        'MR' => ['name' => 'Mr. Md. Mazbaur Rashid', 'designation' => 'Lecturer'],
        'MRN' => ['name' => 'Mr. Md. Rashedun Nabi', 'designation' => 'Lecturer'],
        'MRS' => ['name' => 'Mr. S.M Saidur Rahman', 'designation' => 'Lecturer'],
        'MSA' => ['name' => 'Mr. Md. Shohel Arman', 'designation' => 'Assistant Professor'],
        'MSH' => ['name' => 'Md. Sagar Hossen', 'designation' => 'Lecturer'],
        'MSI' => ['name' => 'Dr. Md. Shafikul Islam', 'designation' => 'Assistant Professor'],
        'MSIM' => ['name' => 'Mr. Md. Saiful Islam', 'designation' => 'Lecturer'],
        'MSM' => ['name' => 'Dr. Mohammad Sultan Mahmud', 'designation' => 'Assistant Professor'],
        'MSP' => ['name' => 'Md. Shahriar Parvez', 'designation' => 'Lecturer'],
        'MSS' => ['name' => 'Prof. Dr. A. H. M. Saifullah Sadi', 'designation' => 'Professor & Director, M.Sc in Cyber Security'],
        'MST' => ['name' => 'Mr. Md. Sajjad Hossain', 'designation' => 'Lecturer'],
        'MTC' => ['name' => 'Mr. Tanvir Chowdhury', 'designation' => 'Lecturer'],
        'MTE' => ['name' => 'Mr. Tanvir Ehasan', 'designation' => 'Lecturer'],
        'MTH' => ['name' => 'Mr. Md. Tanvir Hasan', 'designation' => 'Lecturer'],
        'MTM' => ['name' => 'Ms. Tahmina Meem', 'designation' => 'Lecturer'],
        'NAJ' => ['name' => 'Ms. Naomi Afrin Jalil', 'designation' => 'Lecturer'],
        'NBA' => ['name' => 'Dr. Mohammed Nadir Bin Ali', 'designation' => 'Associate Professor (Part time)'],
        'NDP' => ['name' => 'Mr. Nayan Dey', 'designation' => 'Lecturer'],
        'NFT' => ['name' => 'Ms. Nusrat Fatema Tushi', 'designation' => 'Lecturer'],
        'NIR' => ['name' => 'Ms. Noshin Ibnat Raisa', 'designation' => 'Lecturer'],
        'NJN' => ['name' => 'Ms. Nusrat Jahan Nishat', 'designation' => 'Lecturer'],
        'NML' => ['name' => 'Mr. Nasim Mahmud Likhon', 'designation' => 'Lecturer'],
        'PC' => ['name' => 'Mr. Partho Chanda', 'designation' => 'Lecturer'],
        'PS' => ['name' => 'Mr. Pranto Saha', 'designation' => 'Lecturer'],
        'QFF' => ['name' => 'Ms. Quazi Fariha Fairooz', 'designation' => 'Lecturer'],
        'RA' => ['name' => 'Mr. Md. Rashedul Alam', 'designation' => 'Lecturer'],
        'RCDT' => ['name' => 'Mr. Ratan Kumar Saha', 'designation' => 'Lecturer'],
        'RH' => ['name' => 'Mr. Rony Hossain', 'designation' => 'Lecturer'],
        'RHH' => ['name' => 'Mr. Rashidul Hasan Hridoy', 'designation' => 'Lecturer'],
        'RI' => ['name' => 'Dr. Rubaiyat Islam', 'designation' => 'Associate Professor'],
        'RJM' => ['name' => 'Ms. Raiyan Janik Monir', 'designation' => 'Lecturer'],
        'RRB' => ['name' => 'Ms. Rubaiya Razin Bushra', 'designation' => 'Lecturer'],
        'RT' => ['name' => 'Ms. Rifa Tasfia', 'designation' => 'Lecturer'],
        'RUA' => ['name' => 'Mr. Rahat uddin Azad', 'designation' => 'Lecturer'],
        'SA' => ['name' => 'Ms. Sumona Afroz', 'designation' => 'Lecturer (Part time)'],
        'SAM' => ['name' => 'Md. Sakib Ali Mazumder', 'designation' => 'Lecturer'],
        'SAS' => ['name' => 'Prof. Dr. A. H. M. Saifullah Sadi', 'designation' => 'Professor & Director, M.Sc in Cyber Security'],
        'SCS' => ['name' => 'Mr. Suprove Chandra Sarkar', 'designation' => 'Lecturer'],
        'SD' => ['name' => 'Ms. Sayone Dey', 'designation' => 'Lecturer'],
        'SH' => ['name' => 'Ms. Shahina Haque', 'designation' => 'Assistant Professor'],
        'SHN' => ['name' => 'Mr. Shazzad Hossain', 'designation' => 'Lecturer'],
        'SI' => ['name' => 'Dr. Saiful Islam', 'designation' => 'Lecturer (Senior Scale)'],
        'SIK' => ['name' => 'Md. Saimim Islam Khan Hamim', 'designation' => 'Lecturer'],
        'SIM' => ['name' => 'Mr. Samiul Islam Mugdho', 'designation' => 'Lecturer'],
        'SK' => ['name' => 'Md. Saimim Islam Khan Hamim', 'designation' => 'Lecturer'],
        'SMR' => ['name' => 'Mr. S.M Saidur Rahman', 'designation' => 'Lecturer'],
        'SNM' => ['name' => 'Mr. S. M. Nahian Muktadir', 'designation' => 'Lecturer'],
        'SP' => ['name' => 'Md. Shahriar Parvez', 'designation' => 'Lecturer'],
        'SPB' => ['name' => 'Mr. Sourov Roy Pranta', 'designation' => 'Lecturer'],
        'SR' => ['name' => 'Mr. Md. Selim Reza', 'designation' => 'Assistant Professor'],
        'SS' => ['name' => 'Ms. Sadia Sultana', 'designation' => 'Lecturer'],
        'SSA' => ['name' => 'Prof. Dr. A. H. M. Saifullah Sadi', 'designation' => 'Professor & Director, M.Sc in Cyber Security'],
        'SSI' => ['name' => 'Mr. Syed Shams Islam', 'designation' => 'Lecturer'],
        'SSR' => ['name' => 'Mr. S.M Saidur Rahman', 'designation' => 'Lecturer'],
        'SST' => ['name' => 'Ms. Salmoon Shefath Tisha', 'designation' => 'Lecturer'],
        'ST' => ['name' => 'Sheikh Tonmoy', 'designation' => 'Lecturer'],
        'TBH' => ['name' => 'Tahmid Bin Haque', 'designation' => 'Lecturer'],
        'TBN' => ['name' => 'Md. Tashrif Bin Noor', 'designation' => 'Lecturer (Part time)'],
        'THZ' => ['name' => 'Mr. Tanvir Hasan Zoha', 'designation' => 'Associate Professor (Part time)'],
        'TM' => ['name' => 'Ms. Tahmina Meem', 'designation' => 'Lecturer'],
        'TR' => ['name' => 'Ms. Tasnim Rahman', 'designation' => 'Lecturer'],
        'TRK' => ['name' => 'Mr. Tanveer Rahman Khan', 'designation' => 'Lecturer'],
        'TRN' => ['name' => 'Ms. Tasnim Rahman', 'designation' => 'Lecturer'],
        'TRT' => ['name' => 'Ms. Tapushe Rabaya Toma', 'designation' => 'Assistant Professor'],
        'TT' => ['name' => 'Ms. Tahsin Tasnim', 'designation' => 'Lecturer'],
        'UKD' => ['name' => 'Mr. Uttam Kumar Dey', 'designation' => 'Assistant Professor'],
        'WNI' => ['name' => 'Ms. Wasema Nooren Islam', 'designation' => 'Lecturer'],
        'ZNM' => ['name' => 'Mr. Zarin Tusnim', 'designation' => 'Lecturer'],
        'ZS' => ['name' => 'Dr. Zulfikar Alom', 'designation' => 'Associate Professor'],
        'ZT' => ['name' => 'Mr. Zarin Tusnim', 'designation' => 'Lecturer'],
    ];

    /**
     * Get details for a teacher initial.
     *
     * @return array{name: string, designation: string, initial: string, on_leave?: bool}
     */
    public static function getFaculty(string $initial): array
    {
        $clean = strtoupper(trim($initial));

        if (isset(self::$onLeaveList[$clean])) {
            return array_merge(self::$onLeaveList[$clean], [
                'initial' => $clean,
                'on_leave' => true,
            ]);
        }

        if (isset(self::$facultyList[$clean])) {
            return array_merge(self::$facultyList[$clean], [
                'initial' => $clean,
                'on_leave' => false,
            ]);
        }

        if ($clean === 'TBA' || empty($clean)) {
            return [
                'initial' => $clean ?: 'TBA',
                'name' => 'To Be Announced (TBA)',
                'designation' => 'Department Faculty',
                'on_leave' => false,
            ];
        }

        return [
            'initial' => $clean,
            'name' => "Faculty ({$clean})",
            'designation' => 'SWE Department Faculty',
            'on_leave' => false,
        ];
    }

    /**
     * Check if a faculty member is currently on study leave or leave.
     */
    public static function isOnLeave(string $initial): bool
    {
        $clean = strtoupper(trim($initial));

        return isset(self::$onLeaveList[$clean]);
    }

    /**
     * Get list of faculty members on study leave or leave.
     *
     * @return array<string, array{name: string, designation: string, status: string}>
     */
    public static function getOnLeave(): array
    {
        return self::$onLeaveList;
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
     * Get all active faculty members sorted alphabetically by initials.
     * Excludes members on study leave.
     *
     * @return array<string, array{name: string, designation: string, initial: string}>
     */
    public static function all(): array
    {
        $all = [];
        foreach (self::$facultyList as $initial => $info) {
            $all[$initial] = array_merge($info, [
                'initial' => $initial,
                'on_leave' => false,
            ]);
        }

        ksort($all);

        return $all;
    }

    /**
     * Search active faculty by initial or name.
     * Excludes members on study leave.
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
                $results[$initial] = array_merge($info, [
                    'initial' => $initial,
                    'on_leave' => false,
                ]);
            }
        }

        ksort($results);

        return $results;
    }
}
