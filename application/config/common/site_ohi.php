<?php/* * To change this license header]=choose License Headers in Project Properties. * To change this template file]=choose Tools | Templates * and open the template in the editor. */$config['SITE'] = array(    "name" => "Ohi Prokashani",    'website' => "http://ohiprokashani.com/",    'logo'=>'ohi logo.gif');$config['main_sidebar_title'] = "Ohi Prokashoni <br> MGMT";$config['DEVELOPER'] = array(    "name" => "Friends IT",    'website' => "http://friendsitltd.com/");//(coma separated integer) Jodi kono shoujonno shonkha thake contact e  //ekta speciment contact add kore tar id ekhe add kore dite hobe .//if nothing found add a negetive integer$config['speciment_contact_id'] = '3';$config['new_stock_ordering_contact_id'] = '';$config['ASSET_FOLDER'] = "asset/";$config['ADMIN_THEME'] = 'Admin_theme/AdminLTE/'; //Theme location on view folder$config['THEME_ASSET'] = $config['ASSET_FOLDER'] . $config['ADMIN_THEME'];$config['book_categories'] = array('Bangla', 'English', 'Math', 'ICT');$config['LOGIN_THEME'] = 'Login_theme/facebook-login/'; //Theme location on view folder$config['book_categories'] = array(    'উচ্চমাধ্যমিক',    'স্নাতক(পাস)',    'স্নাতক(অনার্স)',    'স্নাতকোত্তর');$config['storing_place'] = array(    'Printing Press' => 'Printing Press',    'Binding Store' => 'Binding Store',    'Sales Store' => 'Sales Store');$config['contact_type'] = array(    'Buyer' => 'Buyer',    'Printing Press' => 'Printing Press',    'Binding Store' => 'Binding Store',    'Sales Store' => 'Sales Store',    'Other' => 'Other');$config['division'] = array('', 'Barisal', 'Chittagong', 'Dhaka', 'Khulna', 'Mymensingh', 'Rajshahi', 'Rangpur', 'Sylhet');//DB tables$config['db_tables'] = array(    'ci_sessionsHide' => 'ci_sessionsHide',    'login_attempts' => 'login_attempts',    'pub_books' => 'pub_books',    'pub_contacts' => 'pub_contacts',    'pub_contacts_teacher' => 'pub_contacts_teacher',    'pub_books_return' => 'pub_books_return',    'pub_memos' => 'pub_memos',    'pub_memos_selected_books' => 'pub_memos_selected_books',    'pub_send_to_rebind' => 'pub_send_to_rebind',    'pub_stock' => 'pub_stock',    'users' => 'users',    'user_autologin' => 'user_autologin',    'user_profiles' => 'user_profiles',    'pub_stock_m' => 'pub_stock_m');$config['upazila_english'] = array("",    "Abhaynagar Upazila",    "Adamdighi Upazila",    "Aditmari Upazila",    "Agailjhara Upazila",    "Ajmiriganj Upazila",    "Akhaura Upazila",    "Akkelpur Upazila",    "Alamdanga Upazila",    "Alfadanga Upazila",    "Ali Kadam Upazila",    "Amtali Upazila",    "Anwara Upazila",    "Araihazar Upazila",    "Ashuganj Upazila",    "Assasuni Upazila",    "Astagram Upazila",    "Ataikula Upazila",    "Atgharia Upazila",    "Atpara Upazila",    "Atrai Upazila",    "Atwari Upazila",    "Babuganj Upazila",    "Badalgachhi Upazila",    "Badarganj Upazila",    "Bagaichhari Upazila",    "Bagatipara Upazila",    "Bagerhat Sadar Upazila",    "Bagha Upazila",    "Bagherpara Upazila",    "Bagmara Upazila",    "Bahubal Upazila",    "Bajitpur Upazila",    "Bakerganj Upazila",    "Baksiganj Upazila",    "Balaganj Upazila",    "Baliadangi Upazila",    "Baliakandi Upazila",    "Bamna Upazila",    "Banaripara Upazila",    "Bancharampur Upazila",    "Bandar Upazila",    "Bandarban Sadar Upazila",    "Bandor (Chittagong Port) Thana",    "Baniyachong Upazila",    "Banshkhali Upazila",    "Baraigram Upazila",    "Barguna Sadar Upazila",    "Barhatta Upazila",    "Barisal Sadar Upazila",    "Barkal Upazila",    "Barlekha Upazila",    "Barura Upazila",    "Basail Upazila",    "Batiaghata Upazila",    "Bauphal Upazila",    "Beanibazar Upazila",    "Begumganj Upazila",    "Belabo Upazila",    "Belaichhari Upazila",    "Belkuchi Upazila",    "Bera Upazila",    "Betagi Upazila",    "Bhairab Upazila",    "Bhaluka Upazila",    "Bhandaria Upazila",    "Bhanga Upazila",    "Bhangura Upazila",    "Bhedarganj Upazila",    "Bheramara Upazila",    "Bhola Sadar Upazila",    "Bholahat Upazila",    "Bhuapur Upazila",    "Bhurungamari Upazila",    "Bijoynagar Upazila",    "Biral Upazila",    "Birampur Upazila",    "Birganj Upazila",    "Bishwamvarpur Upazila",    "Bishwanath Upazila",    "Boalia Thana",    "Boalkhali Upazila",    "Boalmari Upazila",    "Bochaganj Upazila",    "Boda Upazila",    "Bogra Sadar Upazila",    "Brahmanbaria Sadar Upazila",    "Brahmanpara Upazila",    "Burhanuddin Upazila",    "Burichang Upazila",    "Chakaria Upazila",    "Chandanaish Upazila",    "Chandgaon Thana",    "Chandina Upazila",    "Chandpur Sadar Upazila",    "Char Fasson Upazila",    "Char Rajibpur Upazila",    "Charbhadrasan Upazila",    "Charghat Upazila",    "Chatkhil Upazila",    "Chatmohar Upazila",    "Chauddagram Upazila",    "Chaugachha Upazila",    "Chauhali Upazila",    "Chhagalnaiya Upazila",    "Chhatak Upazila",    "Chilmari Upazila",    "Chirirbandar Upazila",    "Chitalmari Upazila",    "Chuadanga Sadar Upazila",    "Chunarughat Upazila",    "Comilla Adarsha Sadar Upazila",    "Comilla Sadar Dakshin Upazila",    "Companiganj Upazila",    "Companigonj Upazila",    "Cox's Bazar Sadar Upazila",    "Dacope Upazila",    "Daganbhuiyan Upazila",    "Damudya Upazila",    "Damurhuda Upazila",    "Dashmina Upazila",    "Daudkandi Upazila",    "Daulatkhan Upazila",    "Daulatpur Thana",    "Daulatpur Upazila",    "Daulatpur Upazila",    "Debhata Upazila",    "Debidwar Upazila",    "Debiganj Upazila",    "Delduar Upazila",    "Derai Upazila",    "Dewanganj Upazila",    "Dhamoirhat Upazila",    "Dhamrai Upazila",    "Dhanbari Upazila",    "Dharampasha Upazila",    "Dhobaura Upazila",    "Dhunat Upazila",    "Dhupchanchia Upazila",    "Dighalia Upazila",    "Dighinala Upazila",    "Dimla Upazila",    "Dinajpur Sadar Upazila",    "Dohar Upazila",    "Domar Upazila",    "Double Mooring Thana",    "Dowarabazar Upazila",    "Dumki Upazila",    "Dumuria Upazila",    "Durgapur Upazila",    "Durgapur Upazila",    "Fakirhat Upazila",    "Faridganj Upazila",    "Faridpur Sadar Upazila",    "Faridpur Upazila",    "Fatikchhari Upazila",    "Fenchuganj Upazila",    "Feni Sadar Upazila",    "Fulbaria Upazila",    "Fulgazi Upazila",    "Gabtali Upazila",    "Gaffargaon Upazila",    "Gaibandha Sadar Upazila",    "Galachipa Upazila",    "Gangachhara Upazila",    "Gangni Upazila",    "Gauripur Upazila",    "Gaurnadi Upazila",    "Gazaria Upazila",    "Gazipur Sadar Upazila",    "Ghatail Upazila",    "Ghior Upazila",    "Ghoraghat Upazila",    "Goalandaghat Upazila",    "Gobindaganj Upazila",    "Godagari Upazila",    "Golapganj Upazila",    "Gomastapur Upazila",    "Gopalganj Sadar Upazila",    "Gopalpur Upazila",    "Gosairhat Upazila",    "Gowainghat Upazila",    "Gurudaspur Upazila",    "Habiganj Sadar Upazila",    "Haimchar Upazila",    "Hakimpur Upazila",    "Haluaghat Upazila",    "Harinakunda Upazila",    "Harintana Thana",    "Haripur Upazila",    "Harirampur Upazila",    "Hathazari Upazila",    "Hatibandha Upazila",    "Hatiya Upazila",    "Haziganj Upazila",    "Hizla Upazila",    "Homna Upazila",    "Hossainpur Upazila",    "Ishwardi Upazila",    "Ishwarganj Upazila",    "Islampur Upazila",    "Itna Upazila",    "Jagannathpur Upazila",    "Jaintiapur Upazila",    "Jaldhaka Upazila",    "Jamalganj Upazila",    "Jamalpur Sadar Upazila",    "Jessore Sadar Upazila",    "Jhalokati Sadar Upazila",    "Jhenaidah Sadar Upazila",    "Jhenaigati Upazila",    "Jhikargachha Upazila",    "Jibannagar Upazila",    "Joypurhat Sadar Upazila",    "Juraichhari Upazila",    "Juri Upazila",    "Kabirhat Upazila",    "Kachua Upazila",    "Kachua Upazila",    "Kahaloo Upazila",    "Kaharole Upazila",    "Kalai Upazila",    "Kalapara Upazila",    "Kalaroa Upazila",    "Kalia Upazila",    "Kaliakair Upazila",    "Kaliganj Upazila",    "Kaliganj Upazila",    "Kaliganj Upazila",    "Kaliganj Upazila",    "Kalihati Upazila",    "Kalkini Upazila",    "Kalmakanda Upazila",    "Kalukhali Upazila",    "Kamalganj Upazila",    "Kamalnagar Upazila",    "Kamarkhanda Upazila",    "Kanaighat Upazila",    "Kapasia Upazila",    "Kaptai Upazila",    "Karimganj Upazila",    "Kasba Upazila",    "Kashiani Upazila",    "Kathalia Upazila",    "Katiadi Upazila",    "Kaunia Upazila",    "Kawkhali (Betbunia) Upazila",    "Kawkhali Upazila",    "Kazipur Upazila",    "Kendua Upazila",    "Keraniganj Upazila",    "Keshabpur Upazila",    "Khagrachhari Upazila",    "Khaliajuri Upazila",    "Khalishpur Thana",    "Khan Jahan Ali Thana",    "Khansama Upazila",    "Khetlal Upazila",    "Khoksa Upazila",    "Kishoreganj Sadar Upazila",    "Kishoreganj Upazila",    "Kotalipara Upazila",    "Kotchandpur Upazila",    "Kotwali Thana",    "Kotwali Thana",    "Koyra Upazila",    "Kulaura Upazila",    "Kuliarchar Upazila",    "Kumarkhali Upazila",    "Kurigram Sadar Upazila",    "Kushtia Sadar Upazila",    "Kutubdia Upazila",    "Lakhai Upazila",    "Laksam Upazila",    "Lakshmichhari Upazila",    "Lakshmipur Sadar Upazila",    "Lalmohan Upazila",    "Lalmonirhat Sadar Upazila",    "Lalpur Upazila",    "Lama Upazila",    "Langadu Upazila",    "Lohagara Upazila",    "Lohagara Upazila",    "Lohajang Upazila",    "Madan Upazila",    "Madarganj Upazila",    "Madaripur Sadar Upazila",    "Madhabpur Upazila",    "Madhukhali Upazila",    "Madhupur Upazila",    "Magura Sadar Upazila",    "Mahalchhari Upazila",    "Maheshkhali Upazila",    "Maheshpur Upazila",    "Manda Upazila",    "Manikchhari Upazila",    "Manikgonj Sadar Upazila",    "Manirampur Upazila",    "Manpura Upazila",    "Mathbaria Upazila",    "Matihar Thana",    "Matiranga Upazila",    "Matlab Dakshin Upazila",    "Matlab Uttar Upazila",    "Meghna Upazila",    "Mehendiganj Upazila",    "Meherpur Sadar Upazila",    "Melandaha Upazila",    "Mirpur Upazila",    "Mirsharai Upazila",    "Mirzaganj Upazila",    "Mirzapur Upazila",    "Mithamain Upazila",    "Mithapukur Upazila",    "Mohadevpur Upazila",    "Mohammadpur Upazila",    "Mohanganj Upazila",    "Mohanpur Upazila",    "Mollahat Upazila",    "Mongla Upazila",    "Monohardi Upazila",    "Monohargonj Upazila",    "Morrelganj Upazila",    "Moulvibazar Sadar Upazila",    "Mujibnagar Upazila",    "Muksudpur Upazila",    "Muktagachha Upazila",    "Muladi Upazila",    "Munshiganj Sadar Upazila",    "Muradnagar Upazila",    "Mymensingh Sadar Upazila",    "Nabiganj Upazila",    "Nabinagar Upazila",    "Nachole Upazila",    "Nagarkanda Upazila",    "Nagarpur Upazila",    "Nageshwari Upazila",    "Naikhongchhari Upazila",    "Nakla Upazila",    "Nalchity Upazila",    "Naldanga Upazila",    "Nalitabari Upazila",    "Nandail Upazila",    "Nandigram Upazila",    "Nangalkot Upazila",    "Naniyachar Upazila",    "Naogaon Sadar Upazila",    "Naragati Thana",    "Narail Sadar Upazila",    "Narayanganj Sadar Upazila",    "Naria Upazila",    "Narsingdi Sadar Upazila",    "Nasirnagar Upazila",    "Natore Sadar Upazila",    "Nawabganj Sadar Upazila",    "Nawabganj Upazila",    "Nawabganj Upazila",    "Nazirpur Upazila",    "Nesarabad (Swarupkati) Upazila",    "Netrokona Sadar Upazila",    "Niamatpur Upazila",    "Nikli Upazila",    "Nilphamari Sadar Upazila",    "Noakhali Sadar Upazila",    "Paba Upazila",    "Pabna Sadar Upazila",    "Pahartali Thana",    "Paikgachha Upazila",    "Pakundia Upazila",    "Palash Upazila",    "Palashbari Upazila",    "Panchagarh Sadar Upazila",    "Panchbibi Upazila",    "Panchhari Upazila",    "Panchlaish Thana",    "Pangsha Upazila",    "Parbatipur Upazila",    "Parshuram Upazila",    "Patgram Upazila",    "Patharghata Upazila",    "Patiya Upazila",    "Patnitala Upazila",    "Patuakhali Sadar Upazila",    "Pekua Upazila",    "Phulbari Upazila",    "Phulbari Upazila",    "Phulchhari Upazila",    "Phulpur Upazila",    "Phultala Upazila",    "Pirgachha Upazila",    "Pirganj Upazila",    "Pirganj Upazila",    "Pirojpur Sadar Upazila",    "Porsha Upazila",    "Purbadhala Upazila",    "Puthia Upazila",    "Raiganj Upazila",    "Raipur Upazila",    "Raipura Upazila",    "Rajapur Upazila",    "Rajarhat Upazila",    "Rajasthali Upazila",    "Rajbari Sadar Upazila",    "Rajnagar Upazila",    "Rajoir Upazila",    "Rajpara Thana",    "Ramganj Upazila",    "Ramgarh Upazila",    "Ramgati Upazila",    "Rampal Upazila",    "Ramu Upazila",    "Rangabali Upazila",    "Rangamati Sadar Upazila",    "Rangpur Sadar Upazila",    "Rangunia Upazila",    "Raninagar Upazila",    "Ranisankail Upazila",    "Raomari Upazila",    "Raozan Upazila",    "Rowangchhari Upazila",    "Ruma Upazila",    "Rupganj Upazila",    "Rupsha Upazila",    "Sadarpur Upazila",    "Sadullapur Upazila",    "Saidpur Upazila",    "Sakhipur Upazila",    "Saltha Upazila",    "Sandwip Upazila",    "Santhia Upazila",    "Sapahar Upazila",    "Sarail Upazila",    "Sarankhola Upazila",    "Sariakandi Upazila",    "Sarishabari Upazila",    "Satkania Upazila",    "Satkhira Sadar Upazila",    "Saturia Upazila",    "Savar Upazila",    "Senbagh Upazila",    "Shah Mokdum Thana",    "Shahjadpur Upazila",    "Shahrasti Upazila",    "Shailkupa Upazila",    "Shajahanpur Upazila",    "Shakhipur Upazila",    "Shalikha Upazila",    "Shariatpur Sadar Upazila",    "Sharsha Upazila",    "Shekhpara Upazila",    "Sherpur Sadar Upazila",    "Sherpur Upazila",    "Shibchar Upazila",    "Shibganj Upazila",    "Shibganj Upazila",    "Shibpur Upazila",    "Shivalaya Upazila",    "Shyamnagar Upazila",    "Singair Upazila",    "Singra Upazila",    "Sirajdikhan Upazila",    "Sirajganj Sadar Upazila",    "Sitakunda Upazila",    "Sonadanga Thana",    "Sonagazi Upazila",    "Sonaimuri Upazila",    "Sonargaon Upazila",    "Sonatola Upazila",    "South Shurma Upazila",    "South Sunamganj Upazila",    "Sreebardi Upazila",    "Sreemangal Upazila",    "Sreenagar Upazila",    "Sreepur Upazila",    "Sreepur Upazila",    "Subarnachar Upazila",    "Sughatta Upazila",    "Sujanagar Upazila",    "Sullah Upazila",    "Sunamganj Sadar Upazila",    "Sundarganj Upazila",    "Sylhet Sadar Upazila",    "Tahirpur Upazila",    "Tala Upazila",    "Taltoli Upazila",    "Tangail Sadar Upazila",    "Tanore Upazila",    "Tara Khanda Upazila",    "Taraganj Upazila",    "Tarail Upazila",    "Tarash Upazila",    "Tazumuddin Upazila",    "Teknaf Upazila",    "Terokhada Upazila",    "Tetulia Upazila",    "Thakurgaon Sadar Upazila",    "Thanchi Upazila",    "Titas Upazila",    "Tongibari Upazila",    "Trishal Upazila",    "Tungipara Upazila",    "Ukhia Upazila",    "Ulipur Upazila",    "Ullahpara Upazila",    "Wazirpur Upazila",    "Zakiganj Upazila",    "Zanjira Upazila",    "Zianagor Upazila");$config['teacher_subject'] = array("",    "ACCOUNTING",    "BANGLA",    "BOTANY",    "CHEMISTRY",    "COMPUTER",    "ECONOMICS",    "ENGLISH",    "FINANCE",    "GEOGRAPHY AND ENVIRONMENT",    "HISTORY",    "HOME ECONOMICS",    "ISLAMIC HISTORY AND CULTURE",    "ISLAMIC STUDIES",    "MANAGEMENT",    "MARKETING",    "MATHEMATICS",    "PHILOSOPHY",    "PHYSICS",    "POLITICAL SCIENCE",    "SANSKRIT",    "SOCIAL WORK",    "SOCIOLOGY",    "SOIL SCIENCE",    "STATISTICS",    "ZOOLOGY");$config['districts_english'] = array("",    'Bagerhat',    'Bandarban',    'Barguna',    'Barisal',    'Bogra',    'Bhola',    'Brahmanbaria',    'Comilla',    'Cox\'s Bazar',    'Chandpur',    'Chapainawabganj',    'Chittagong',    'Chuadanga',    'Dinajpur',    'Dhaka',    'Faridpur',    'Feni',    'Gaibandha',    'Gazipur',    'Gopalganj',    'Habiganj',    'Jamalpur',    'Jessore',    'Joypurhat',    'Jhalokati',    'Jhenaidah',    'Kishoreganj',    'Khagrachhari',    'Khulna',    'Kurigram',    'Kushtia',    'Lakshmipur',    'Lalmonirhat',    'Madaripur',    'Magura',    'Manikganj',    'Meherpur',    'Moulvibazar',    'Munshiganj',    'Mymensingh',    'Naogaon',    'Narail',    'Narayanganj',    'Narsingdi',    'Natore',    'Nilphamari',    'Netrakona',    'Noakhali',    'Pabna',    'Panchagarh',    'Patuakhali',    'Pirojpur',    'Rajbari',    'Rajshahi',    'Rangamati',    'Rangpur',    'Satkhira',    'Sirajganj',    'Shariatpur',    'Sherpur',    'Sunamganj',    'Sylhet',    'Tangail',    'Thakurgaon');$config['districts_bangla'] = array('বরগুনা', 'বরিশাল', 'ভোলা', 'ঝালকাঠি', 'পটুয়াখালী', 'পিরোজপুর', 'বান্দরবান', 'ব্রাহ্মণবাড়ীয়া', 'চাঁদপুর', 'চট্টগ্রাম', 'কুমিল্লা', 'কক্সবাজার', 'ফেনী', 'খাগড়াছড়ি', 'লক্ষীপুর', 'নোয়াখালী', 'রাঙ্গামাটি', 'ঢাকা', 'ফরিদপুর', 'গাজীপুর', 'গোপালগঞ্জ', 'কিশোরগঞ্জ', 'মাদারীপুর', 'মানিকগঞ্জ', 'মুন্সীগঞ্জ', 'নারায়ণগঞ্জ', 'নরসিংদী', 'রাজবাড়ী', 'শরীয়তপুর', 'টাঙ্গাইল', 'বাগেরহাট', 'চুয়াডাঙ্গা', 'যশোর', 'ঝিনাইদহ', 'খুলনা', 'কুষ্টিয়া', 'মাগুরা', 'মেহেরপুর', 'নড়াইল', 'সাতক্ষিরা', 'জামালপুর', 'ময়মনসিংহ', 'নেত্রকোনা', 'শেরপুর', 'বগুড়া', 'জয়পুরহাট', 'নওগাঁ', 'নাটোর', 'নওয়াবগঞ্জ', 'পাবনা', 'রাজশাহী', 'সিরাজগঞ্জ', 'দিনাজপুর', 'গাইবান্ধা', 'কুড়িগ্রাম', 'লালমনিরহাট', 'নীলফামারী', 'পঞ্চগড়', 'রংপুর', 'ঠাকুরগাঁ', 'হবিগঞ্জ', 'মৌলভীবাজার',    'সুনামগঞ্জ', 'সিলেট');function make_index_same_as_value($array) {    foreach ($array as $index => $value) {        $product_array[$value] = $value;    }    return $product_array;}$config['districts_english'] = make_index_same_as_value($config['districts_english']);$config['upazila_english'] = make_index_same_as_value($config['upazila_english']);$config['teacher_subject'] = make_index_same_as_value($config['teacher_subject']);$config['division'] = make_index_same_as_value($config['division']);$config['book_categories'] = make_index_same_as_value($config['book_categories']);//$config['districts_bangla'] = make_index_same_as_value($config['districts_bangla']);