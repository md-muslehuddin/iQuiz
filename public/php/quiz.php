<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iQuiz: The Ultimate iQuiz Experience</title>
    <link rel="icon" href="public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/quiz.css">

</head>

<body>
    <h1>Quiz</h1>

    <form action="result.php" method="post">
        <?php
        if (!($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST["topic"]) && isset ($_POST["subtopic"]))) {
            echo '<p id="errmsg">No data submitted.</p>';
            exit();
        } else {
            $selectedTopic = $_POST["topic"];
            $selectedSubtopic = $_POST["subtopic"];

            $questions = [];
            $questions["Computer History"] = [
                [
                    "question" => "What is the first computer?",
                    "correctAnswer" => "ENIAC",
                    "answerChoices" => ["ENIAC", "Apple II", "IBM PC", "Commodore 64", "Atari 2600"]
                ],
                [
                    "question" => "Who is the father of modern computing?",
                    "correctAnswer" => "Alan Turing",
                    "answerChoices" => ["Alan Turing", "Steve Jobs", "Bill Gates", "Tim Berners-Lee", "Ada Lovelace"]
                ],
                [
                    "question" => "What was the name of the first programming language, developed by Grace Hopper in the 1950s?",
                    "correctAnswer" => "COBOL",
                    "answerChoices" => ["JAVA", "HTML", "COBOL", "BASIC"]
                ],
                [
                    "question" => "Which company introduced the Macintosh computer in 1984?",
                    "correctAnswer" => "Apple",
                    "answerChoices" => ["Microsoft", "IBM", "Dell", "Apple"]
                ],
                [
                    "question" => "Who is often considered the 'father of the computer' for his work on the analytical engine in the 1830s?",
                    "correctAnswer" => "Charles Babbage",
                    "answerChoices" => ["Steve Jobs", "Mark Zuckerberg", "Tim Berners-Lee", "Charles Babbage"]
                ],
                [
                    "question" => "What was the first graphical web browser, created by Marc Andreessen in the early 1990s?",
                    "correctAnswer" => "Mosaic",
                    "answerChoices" => ["Internet Explorer", "Firefox", "Safari", "Mosaic"]
                ],
                [
                    "question" => "In what decade was the concept of a 'mouse' as a computer input device first introduced?",
                    "correctAnswer" => "1960s",
                    "answerChoices" => ["1980s", "1950s", "1970s", "1960s"]
                ],
                [
                    "question" => "What is the name of the first video game, developed by William Higinbotham in 1958?",
                    "correctAnswer" => "Tennis for Two",
                    "answerChoices" => ["Pong", "Super Mario Bros.", "Call of Duty", "Tennis for Two"]
                ],
                [
                    "question" => "What does ENIAC stand for, the first general-purpose electronic digital computer?",
                    "correctAnswer" => "Electronic Numerical Integrator and Computer",
                    "answerChoices" => ["Electronic Network Interface and Analyzer Computer", "Electric National Information and Calculation", "Extreme Numeric Integration and Calculation", "Electronic Numerical Integrator and Computer"]
                ],
                [
                    "question" => "Who co-founded Microsoft alongside Bill Gates in 1975?",
                    "correctAnswer" => "Paul Allen",
                    "answerChoices" => ["Steve Wozniak", "Steve Ballmer", "Larry Ellison", "Paul Allen"]
                ]
            ];
            $questions["Internet"] = [
                [
                    "question" => "Full form of HTTP?",
                    "correctAnswer" => "Hypertext Transfer Protocol",
                    "answerChoices" => ["Hypertext Transfer Protocol", "Hyperlink Text Transmission", "High-Technology Transfer Protocol", "Hypertext Transmission Process"]
                ],
                [
                    "question" => "Which organization is responsible for the allocation of IP addresses and domain names?",
                    "correctAnswer" => "ICANN (Internet Corporation for Assigned Names and Numbers)",
                    "answerChoices" => ["ITU (International Telecommunication Union)", "W3C (World Wide Web Consortium)", "ICANN (Internet Corporation for Assigned Names and Numbers)", "ISO (International Organization for Standardization)"]
                ],
                [
                    "question" => "What year was the World Wide Web (WWW) invented?",
                    "correctAnswer" => "1989",
                    "answerChoices" => ["1979", "1989", "1999", "2009"]
                ],
                [
                    "question" => "What is the most widely used web browser in the world?",
                    "correctAnswer" => "Google Chrome",
                    "answerChoices" => ["Mozilla Firefox", "Microsoft Edge", "Google Chrome", "Safari"]
                ],
                [
                    "question" => "What does ISP stand for?",
                    "correctAnswer" => "Internet Service Provider",
                    "answerChoices" => ["Internet Service Provider", "Information Security Protocol", "International Server Platform", "Internet Standard Protocol"]
                ],
                [
                    "question" => "What is the purpose of a DNS server?",
                    "correctAnswer" => "Resolving domain names to IP addresses",
                    "answerChoices" => ["Encrypting internet traffic", "Filtering spam emails", "Resolving domain names to IP addresses", "Creating websites"]
                ],
                [
                    "question" => "What protocol is used for sending and receiving emails over the internet?",
                    "correctAnswer" => "SMTP (Simple Mail Transfer Protocol)",
                    "answerChoices" => ["FTP (File Transfer Protocol)", "HTTP (Hypertext Transfer Protocol)", "SMTP (Simple Mail Transfer Protocol)", "POP3 (Post Office Protocol 3)"]
                ],
                [
                    "question" => "What does URL stand for?",
                    "correctAnswer" => "Uniform Resource Locator",
                    "answerChoices" => [
                        "Universal Remote Locator",
                        "Uniform Resource Locator",
                        "User Registration Link",
                        "Universal Record Locator",
                    ]
                ],
                [
                    "question" => "Which social media platform was founded by Mark Zuckerberg in 2004?",
                    "correctAnswer" => "Facebook",
                    "answerChoices" => ["Twitter", "Instagram", "Facebook", "Snapchat"]
                ],
                [
                    "question" => "What is the maximum number of characters allowed in a standard tweet on Twitter?",
                    "correctAnswer" => "280",
                    "answerChoices" => ["140", "280", "360", "200"]
                ]
            ];
            $questions["Smartphones"] = [
                [
                    "question" => "Which company is known for producing the iPhone?",
                    "correctAnswer" => "Apple",
                    "answerChoices" => [
                        "Samsung",
                        "Google",
                        "Apple",
                        "Huawei",
                    ]
                ],
                [
                    "question" => "What operating system does the majority of smartphones use?",
                    "correctAnswer" => "Android",
                    "answerChoices" => [
                        "iOS",
                        "Windows",
                        "Android",
                        "BlackBerry OS",
                    ]
                ],
                [
                    "question" => "Which smartphone feature allows you to unlock your phone using your face or fingerprint?",
                    "correctAnswer" => "Biometric authentication",
                    "answerChoices" => [
                        "NFC (Near Field Communication)",
                        "Biometric authentication",
                        "Wireless charging",
                        "IR blaster",
                    ]
                ],
                [
                    "question" => "Which smartphone brand is known for its stylus, called the S Pen?",
                    "correctAnswer" => "Samsung",
                    "answerChoices" => [
                        "Apple",
                        "Google",
                        "Samsung",
                        "LG",
                    ]
                ],
                [
                    "question" => "What does LTE stand for in the context of cellular networks?",
                    "correctAnswer" => "Long-Term Evolution",
                    "answerChoices" => [
                        "Low-Transmission Encryption",
                        "Long-Term Evolution",
                        "Local Telephone Exchange",
                        "Lasting Time Efficiency",
                    ]
                ],
                [
                    "question" => "What year was the first commercially available smartphone, the IBM Simon, released?",
                    "correctAnswer" => "1994",
                    "answerChoices" => [
                        "1984",
                        "1994",
                        "2004",
                        "2014",
                    ]
                ],
                [
                    "question" => "Which smartphone manufacturer is headquartered in South Korea?",
                    "correctAnswer" => "Samsung",
                    "answerChoices" => [
                        "Apple",
                        "Google",
                        "Samsung",
                        "Sony",
                    ]
                ],
                [
                    "question" => "What is the term for the high-resolution screen technology used in many modern smartphones?",
                    "correctAnswer" => "AMOLED (Active Matrix Organic Light Emitting Diode)",
                    "answerChoices" => [
                        "LCD (Liquid Crystal Display)",
                        "OLED (Organic Light Emitting Diode)",
                        "AMOLED (Active Matrix Organic Light Emitting Diode)",
                        "LED (Light Emitting Diode)",
                    ]
                ],
                [
                    "question" => "What smartphone feature allows you to track its location if it's lost or stolen?",
                    "correctAnswer" => "GPS (Global Positioning System)",
                    "answerChoices" => [
                        "Bluetooth",
                        "NFC (Near Field Communication)",
                        "GPS (Global Positioning System)",
                        "Wi-Fi",
                    ]
                ],
                [
                    "question" => "Which smartphone brand is known for its 'Pixel' series of phones?",
                    "correctAnswer" => "Google",
                    "answerChoices" => [
                        "Samsung",
                        "Apple",
                        "Google",
                        "OnePlus",
                    ]
                ]
            ];
            $questions["Artificial intelligence"] = [
                [
                    "question" => "What does AI stand for?",
                    "correctAnswer" => "Artificial Intelligence",
                    "answerChoices" => [
                        "Automated Inference",
                        "Advanced Integration",
                        "Artificial Intelligence",
                        "Algorithmic Interpretation",
                    ]
                ],
                [
                    "question" => "Which programming language is commonly used for implementing AI algorithms?",
                    "correctAnswer" => "Python",
                    "answerChoices" => [
                        "Java",
                        "C++",
                        "Python",
                        "Ruby",
                    ]
                ],
                [
                    "question" => "What type of AI system can perform tasks without explicit programming and learn from data?",
                    "correctAnswer" => "Machine Learning",
                    "answerChoices" => [
                        "Expert System",
                        "Neural Network",
                        "Machine Learning",
                        "Genetic Algorithm",
                    ]
                ],
                [
                    "question" => "What is the term for AI's ability to understand and interpret human language?",
                    "correctAnswer" => "Natural Language Processing (NLP)",
                    "answerChoices" => [
                        "Machine Vision",
                        "Artificial Cognition",
                        "Natural Language Processing (NLP)",
                        "Neural Linguistic Programming",
                    ]
                ],
                [
                    "question" => "What AI system famously defeated human champions in the game of chess?",
                    "correctAnswer" => "IBM's Deep Blue",
                    "answerChoices" => [
                        "Google's AlphaGo",
                        "IBM's Deep Blue",
                        "Microsoft's Watson",
                        "Amazon's Alexa",
                    ]
                ],
                [
                    "question" => "Which ethical concern involves AI systems making biased decisions based on the data they were trained on?",
                    "correctAnswer" => "Algorithmic Bias",
                    "answerChoices" => [
                        "Data Privacy",
                        "Algorithmic Bias",
                        "Robotic Uprising",
                        "Quantum Supremacy",
                    ]
                ],
                [
                    "question" => "What does RNN stand for in the context of neural networks?",
                    "correctAnswer" => "Recurrent Neural Network",
                    "answerChoices" => [
                        "Random Neuron Network",
                        "Recurrent Neural Network",
                        "Resilient Neuron Node",
                        "Recursive Network Notation",
                    ]
                ],
                [
                    "question" => "Which AI technology is designed to simulate human-like conversations with users?",
                    "correctAnswer" => "Chatbots",
                    "answerChoices" => [
                        "Drones",
                        "Chatbots",
                        "IoT Devices",
                        "Quantum Computers",
                    ]
                ],
                [
                    "question" => "What is the term for the process of training an AI model on a specific dataset?",
                    "correctAnswer" => "Supervised Learning",
                    "answerChoices" => [
                        "Unsupervised Learning",
                        "Reinforcement Learning",
                        "Supervised Learning",
                        "Semi-Supervised Learning",
                    ]
                ],
                [
                    "question" => "Which science fiction author coined the term 'robot' in the 1920 play 'R.U.R.'?",
                    "correctAnswer" => "Karel Čapek",
                    "answerChoices" => [
                        "Isaac Asimov",
                        "Arthur C. Clarke",
                        "Philip K. Dick",
                        "Karel Čapek",
                    ]
                ]
            ];
            $questions["Modern History"] = [
                [
                    "question" => "Who is known for leading the Indian independence movement against British colonial rule?",
                    "correctAnswer" => "Mahatma Gandhi",
                    "answerChoices" => [
                        "Winston Churchill",
                        "Nelson Mandela",
                        "Jawaharlal Nehru",
                        "Mahatma Gandhi",
                    ]
                ],
                [
                    "question" => "Which war is often referred to as the 'Great War' and 'World War I'?",
                    "correctAnswer" => "World War I",
                    "answerChoices" => [
                        "Korean War",
                        "Vietnam War",
                        "World War II",
                        "World War I",
                    ]
                ],
                [
                    "question" => "Who was the first woman to fly solo across the Atlantic Ocean?",
                    "correctAnswer" => "Amelia Earhart",
                    "answerChoices" => [
                        "Bessie Coleman",
                        "Amelia Earhart",
                        "Harriet Quimby",
                        "Valentina Tereshkova",
                    ]
                ],
                [
                    "question" => "Which political leader was responsible for the 'Cultural Revolution' in China?",
                    "correctAnswer" => "Mao Zedong",
                    "answerChoices" => [
                        "Deng Xiaoping",
                        "Sun Yat-sen",
                        "Chiang Kai-shek",
                        "Mao Zedong",
                    ]
                ],
                [
                    "question" => "What event marked the beginning of the Great Depression in the United States?",
                    "correctAnswer" => "The Stock Market Crash of 1929",
                    "answerChoices" => [
                        "The Prohibition Era",
                        "The New Deal",
                        "The Stock Market Crash of 1929",
                        "The Civil Rights Movement",
                    ]
                ],
                [
                    "question" => "Which European city is divided by the Berlin Wall during the Cold War?",
                    "correctAnswer" => "Berlin",
                    "answerChoices" => [
                        "Vienna",
                        "Amsterdam",
                        "Prague",
                        "Berlin",
                    ]
                ],
                [
                    "question" => "Who was the first woman to become the Prime Minister of the United Kingdom?",
                    "correctAnswer" => "Margaret Thatcher",
                    "answerChoices" => [
                        "Angela Merkel",
                        "Theresa May",
                        "Margaret Thatcher",
                        "Queen Elizabeth II",
                    ]
                ],
                [
                    "question" => "Which treaty officially ended World War I?",
                    "correctAnswer" => "Treaty of Versailles",
                    "answerChoices" => [
                        "Treaty of Tordesillas",
                        "Treaty of Versailles",
                        "Treaty of Paris",
                        "Treaty of Potsdam",
                    ]
                ],
                [
                    "question" => "Who is known for his leadership in the civil rights movement in the United States?",
                    "correctAnswer" => "Martin Luther King Jr.",
                    "answerChoices" => [
                        "Malcolm X",
                        "Rosa Parks",
                        "Martin Luther King Jr.",
                        "John F. Kennedy",
                    ]
                ],
                [
                    "question" => "Which country was divided into North and South after World War II, leading to the Korean War?",
                    "correctAnswer" => "Korea",
                    "answerChoices" => [
                        "Vietnam",
                        "Korea",
                        "Germany",
                        "Japan",
                    ]
                ],
            ];
            $questions["Literature"] = [
                [
                    "question" => "Who wrote the famous play 'Romeo and Juliet'?",
                    "correctAnswer" => "William Shakespeare",
                    "answerChoices" => [
                        "Charles Dickens",
                        "Jane Austen",
                        "Mark Twain",
                        "William Shakespeare",
                    ]
                ],
                [
                    "question" => "Which novel features the character Jay Gatsby and is set during the Roaring Twenties?",
                    "correctAnswer" => "The Great Gatsby",
                    "answerChoices" => [
                        "To Kill a Mockingbird",
                        "Pride and Prejudice",
                        "The Great Gatsby",
                        "1984",
                    ]
                ],
                [
                    "question" => "In 'Alice's Adventures in Wonderland,' who is the author of the book the White Rabbit carries?",
                    "correctAnswer" => "Lewis Carroll",
                    "answerChoices" => [
                        "J.M. Barrie",
                        "Roald Dahl",
                        "Lewis Carroll",
                        "Enid Blyton",
                    ]
                ],
                [
                    "question" => "What is the first book in J.K. Rowling's 'Harry Potter' series?",
                    "correctAnswer" => "Harry Potter and the Philosopher's Stone (Sorcerer's Stone in the US)",
                    "answerChoices" => [
                        "Harry Potter and the Chamber of Secrets",
                        "Harry Potter and the Half-Blood Prince",
                        "Harry Potter and the Philosopher's Stone (Sorcerer's Stone in the US)",
                        "Harry Potter and the Goblet of Fire",
                    ]
                ],
                [
                    "question" => "Who is the author of the novel '1984,' which portrays a dystopian society?",
                    "correctAnswer" => "George Orwell",
                    "answerChoices" => [
                        "Aldous Huxley",
                        "Ray Bradbury",
                        "George Orwell",
                        "Philip K. Dick",
                    ]
                ],
                [
                    "question" => "In 'The Catcher in the Rye,' what is the name of the protagonist?",
                    "correctAnswer" => "Holden Caulfield",
                    "answerChoices" => [
                        "Jay Gatsby",
                        "Atticus Finch",
                        "Holden Caulfield",
                        "Santiago Nasar",
                    ]
                ],
                [
                    "question" => "Who wrote the epic poem 'The Iliad'?",
                    "correctAnswer" => "Homer",
                    "answerChoices" => [
                        "Virgil",
                        "Ovid",
                        "Homer",
                        "Aesop",
                    ]
                ],
                [
                    "question" => "Which novel tells the story of a young girl named Scout Finch and addresses issues of racial injustice?",
                    "correctAnswer" => "To Kill a Mockingbird",
                    "answerChoices" => [
                        "The Grapes of Wrath",
                        "Moby-Dick",
                        "To Kill a Mockingbird",
                        "The Scarlet Letter",
                    ]
                ],
                [
                    "question" => "Who is the author of the fantasy series 'The Chronicles of Narnia'?",
                    "correctAnswer" => "C.S. Lewis",
                    "answerChoices" => [
                        "J.R.R. Tolkien",
                        "J.K. Rowling",
                        "C.S. Lewis",
                        "Philip Pullman",
                    ]
                ],
                [
                    "question" => "Which classic novel tells the story of a shipwrecked sailor named Robinson Crusoe?",
                    "correctAnswer" => "Robinson Crusoe",
                    "answerChoices" => [
                        "Moby-Dick",
                        "Treasure Island",
                        "Robinson Crusoe",
                        "The Adventures of Huckleberry Finn",
                    ]
                ],
            ];
            $questions["Politics & Economics"] = [
                [
                    "question" => "Who was the first Prime Minister of India?",
                    "correctAnswer" => "Jawaharlal Nehru",
                    "answerChoices" => [
                        "Mahatma Gandhi",
                        "Sardar Vallabhbhai Patel",
                        "Jawaharlal Nehru",
                        "Subhas Chandra Bose",
                    ]
                ],
                [
                    "question" => "What is the official name of the Indian Parliament?",
                    "correctAnswer" => "The Parliament of India",
                    "answerChoices" => [
                        "Lok Sabha",
                        "Rajya Sabha",
                        "The Indian Parliament",
                        "The Parliament of India",
                    ]
                ],
                [
                    "question" => "Who is the current Prime Minister of India (as of September 2021)?",
                    "correctAnswer" => "Narendra Modi",
                    "answerChoices" => [
                        "Rahul Gandhi",
                        "Manmohan Singh",
                        "Narendra Modi",
                        "Amit Shah",
                    ]
                ],
                [
                    "question" => "What is the Indian currency called?",
                    "correctAnswer" => "Indian Rupee",
                    "answerChoices" => [
                        "Indian Dollar",
                        "Indian Peso",
                        "Indian Rupee",
                        "Indian Rupiah",
                    ]
                ],
                [
                    "question" => "Which political party was founded by B.R. Ambedkar in 1956?",
                    "correctAnswer" => "Bharatiya Janata Party (BJP)",
                    "answerChoices" => [
                        "Indian National Congress",
                        "Bharatiya Janata Party (BJP)",
                        "Communist Party of India (Marxist)",
                        "Aam Aadmi Party (AAP)",
                    ]
                ],
                [
                    "question" => "What is the name of the Indian space agency responsible for the country's space exploration and research?",
                    "correctAnswer" => "Indian Space Research Organisation (ISRO)",
                    "answerChoices" => [
                        "National Aeronautics and Space Administration (NASA)",
                        "European Space Agency (ESA)",
                        "Indian Space Research Organisation (ISRO)",
                        "Russian Federal Space Agency (Roscosmos)",
                    ]
                ],
                [
                    "question" => "What is the term for the government policy that allows foreign companies to invest in Indian businesses and industries?",
                    "correctAnswer" => "Foreign Direct Investment (FDI)",
                    "answerChoices" => [
                        "Make in India",
                        "Foreign Direct Investment (FDI)",
                        "Swachh Bharat Abhiyan",
                        "Atmanirbhar Bharat",
                    ]
                ],
                [
                    "question" => "Which river is often referred to as the 'Ganga of the South' and is one of the major rivers of South India?",
                    "correctAnswer" => "Godavari",
                    "answerChoices" => [
                        "Yamuna",
                        "Brahmaputra",
                        "Godavari",
                        "Krishna",
                    ]
                ],
                [
                    "question" => "What is the term for the Indian festival of lights celebrated with lamps, fireworks, and sweets?",
                    "correctAnswer" => "Diwali",
                    "answerChoices" => [
                        "Holi",
                        "Diwali",
                        "Navratri",
                        "Ganesh Chaturthi",
                    ]
                ],
                [
                    "question" => "Who is known as the 'Father of the Indian Constitution'?",
                    "correctAnswer" => "B.R. Ambedkar",
                    "answerChoices" => [
                        "Jawaharlal Nehru",
                        "Sardar Vallabhbhai Patel",
                        "B.R. Ambedkar",
                        "Rajendra Prasad",
                    ]
                ],
            ];
            $questions["Science Facts"] = [
                [
                    "question" => "What is the chemical symbol for water?",
                    "correctAnswer" => "H2O",
                    "answerChoices" => [
                        "CO2",
                        "O2",
                        "N2",
                        "H2O",
                    ]
                ],
                [
                    "question" => "What gas do plants absorb from the atmosphere during photosynthesis?",
                    "correctAnswer" => "Carbon dioxide (CO2)",
                    "answerChoices" => [
                        "Oxygen (O2)",
                        "Nitrogen (N2)",
                        "Hydrogen (H2)",
                        "Carbon dioxide (CO2)",
                    ]
                ],
                [
                    "question" => "Which planet is known as the 'Red Planet'?",
                    "correctAnswer" => "Mars",
                    "answerChoices" => [
                        "Venus",
                        "Mercury",
                        "Mars",
                        "Jupiter",
                    ]
                ],
                [
                    "question" => "What is the smallest unit of matter?",
                    "correctAnswer" => "Atom",
                    "answerChoices" => [
                        "Molecule",
                        "Cell",
                        "Proton",
                        "Atom",
                    ]
                ],
                [
                    "question" => "What is the largest planet in our solar system?",
                    "correctAnswer" => "Jupiter",
                    "answerChoices" => [
                        "Saturn",
                        "Mars",
                        "Jupiter",
                        "Earth",
                    ]
                ],
                [
                    "question" => "What is the process by which plants make their own food using sunlight?",
                    "correctAnswer" => "Photosynthesis",
                    "answerChoices" => [
                        "Respiration",
                        "Fermentation",
                        "Photosynthesis",
                        "Digestion",
                    ]
                ],
                [
                    "question" => "What is the chemical symbol for gold?",
                    "correctAnswer" => "Au",
                    "answerChoices" => [
                        "Ag",
                        "Fe",
                        "Au",
                        "Cu",
                    ]
                ],
                [
                    "question" => "What is the hardest natural substance on Earth?",
                    "correctAnswer" => "Diamond",
                    "answerChoices" => [
                        "Graphite",
                        "Quartz",
                        "Talc",
                        "Diamond",
                    ]
                ],
                [
                    "question" => "What gas makes up the majority of Earth's atmosphere?",
                    "correctAnswer" => "Nitrogen (N2)",
                    "answerChoices" => [
                        "Oxygen (O2)",
                        "Carbon dioxide (CO2)",
                        "Helium (He)",
                        "Nitrogen (N2)",
                    ]
                ],
                [
                    "question" => "What is the fastest land animal?",
                    "correctAnswer" => "Cheetah",
                    "answerChoices" => [
                        "Lion",
                        "Gazelle",
                        "Cheetah",
                        "Leopard",
                    ]
                ],
            ];
            $questions["Football"] = [
                [
                    "question" => "Which Indian football club is based in Kolkata and is one of the oldest in the country?",
                    "correctAnswer" => "Mohun Bagan",
                    "answerChoices" => [
                        "Bengaluru FC",
                        "Kerala Blasters FC",
                        "Mohun Bagan",
                        "Chennaiyin FC",
                    ]
                ],
                [
                    "question" => "Who is the all-time top scorer for the Indian national football team?",
                    "correctAnswer" => "Sunil Chhetri",
                    "answerChoices" => [
                        "Bhaichung Bhutia",
                        "Sunil Chhetri",
                        "I. M. Vijayan",
                        "Baichung Bhutia",
                    ]
                ],
                [
                    "question" => "Which city is home to the famous Salt Lake Stadium, one of the largest football stadiums in India?",
                    "correctAnswer" => "Kolkata",
                    "answerChoices" => [
                        "Mumbai",
                        "Kolkata",
                        "Chennai",
                        "Bengaluru",
                    ]
                ],
                [
                    "question" => "In which year did the Indian national football team make its first appearance at the FIFA World Cup?",
                    "correctAnswer" => "1950",
                    "answerChoices" => [
                        "1954",
                        "1962",
                        "1950",
                        "1982",
                    ]
                ],
                [
                    "question" => "What is the top-tier football league in India known as?",
                    "correctAnswer" => "Indian Super League (ISL)",
                    "answerChoices" => [
                        "I-League",
                        "Premier League",
                        "Indian Super League (ISL)",
                        "EFL Championship",
                    ]
                ],
                [
                    "question" => "Which Indian footballer is often referred to as the 'Captain Fantastic'?",
                    "correctAnswer" => "Sunil Chhetri",
                    "answerChoices" => [
                        "Bhaichung Bhutia",
                        "Sunil Chhetri",
                        "I. M. Vijayan",
                        "Sushil Kumar",
                    ]
                ],
                [
                    "question" => "Which country won the first-ever FIFA U-17 World Cup held in India in 2017?",
                    "correctAnswer" => "England",
                    "answerChoices" => [
                        "Brazil",
                        "England",
                        "Germany",
                        "India",
                    ]
                ],
                [
                    "question" => "Which Indian club won the AFC Cup in 2016, becoming the first Indian team to win an AFC club competition?",
                    "correctAnswer" => "Bengaluru FC",
                    "answerChoices" => [
                        "Mohun Bagan",
                        "Chennaiyin FC",
                        "Bengaluru FC",
                        "East Bengal",
                    ]
                ],
                [
                    "question" => "Which former Indian footballer was awarded the prestigious Arjuna Award in recognition of his contribution to the sport?",
                    "correctAnswer" => "I. M. Vijayan",
                    "answerChoices" => [
                        "Bhaichung Bhutia",
                        "Sunil Chhetri",
                        "I. M. Vijayan",
                        "Baichung Bhutia",
                    ]
                ],
                [
                    "question" => "What is the nickname of the Indian national football team?",
                    "correctAnswer" => "Blue Tigers",
                    "answerChoices" => [
                        "Red Elephants",
                        "Yellow Lions",
                        "Green Panthers",
                        "Blue Tigers",
                    ]
                ],
            ];
            $questions["Cricket"] = [
                [
                    "question" => "Who is the current captain of the Indian cricket team in Test matches?",
                    "correctAnswer" => "Virat Kohli",
                    "answerChoices" => [
                        "Rohit Sharma",
                        "Shikhar Dhawan",
                        "Virat Kohli",
                        "KL Rahul",
                    ]
                ],
                [
                    "question" => "What is the name of the Indian Premier League (IPL) team based in Mumbai?",
                    "correctAnswer" => "Mumbai Indians",
                    "answerChoices" => [
                        "Chennai Super Kings",
                        "Kolkata Knight Riders",
                        "Mumbai Indians",
                        "Royal Challengers Bangalore",
                    ]
                ],
                [
                    "question" => "Who holds the record for the highest individual score by an Indian batsman in One Day Internationals (ODIs)?",
                    "correctAnswer" => "Rohit Sharma",
                    "answerChoices" => [
                        "Virat Kohli",
                        "Sachin Tendulkar",
                        "Rohit Sharma",
                        "Virender Sehwag",
                    ]
                ],
                [
                    "question" => "In which year did India win its first Cricket World Cup?",
                    "correctAnswer" => "1983",
                    "answerChoices" => [
                        "1992",
                        "1987",
                        "1983",
                        "2011",
                    ]
                ],
                [
                    "question" => "Who is the highest wicket-taker for India in Test cricket?",
                    "correctAnswer" => "Anil Kumble",
                    "answerChoices" => [
                        "Harbhajan Singh",
                        "Zaheer Khan",
                        "Anil Kumble",
                        "Kapil Dev",
                    ]
                ],
                [
                    "question" => "Which Indian cricketer is known for his nickname 'Captain Cool'?",
                    "correctAnswer" => "Mahendra Singh Dhoni",
                    "answerChoices" => [
                        "Virat Kohli",
                        "Sachin Tendulkar",
                        "Rahul Dravid",
                        "Mahendra Singh Dhoni",
                    ]
                ],
                [
                    "question" => "What is the nickname of the Indian cricket team?",
                    "correctAnswer" => "Men in Blue",
                    "answerChoices" => [
                        "Yellow Brigade",
                        "Men in Blue",
                        "Blue Tigers",
                        "Green Caps",
                    ]
                ],
                [
                    "question" => "Who was the first Indian cricketer to score a century in T20 International cricket?",
                    "correctAnswer" => "Suresh Raina",
                    "answerChoices" => [
                        "Yuvraj Singh",
                        "Suresh Raina",
                        "Rohit Sharma",
                        "Virat Kohli",
                    ]
                ],
                [
                    "question" => "Which Indian cricketer holds the record for the most sixes in international cricket?",
                    "correctAnswer" => "Rohit Sharma",
                    "answerChoices" => [
                        "MS Dhoni",
                        "Virat Kohli",
                        "Sachin Tendulkar",
                        "Rohit Sharma",
                    ]
                ],
                [
                    "question" => "In which city is the Wankhede Stadium, known for hosting important cricket matches, located?",
                    "correctAnswer" => "Mumbai",
                    "answerChoices" => [
                        "Kolkata",
                        "Delhi",
                        "Chennai",
                        "Mumbai",
                    ]
                ],
            ];

            $questions["Hockey"] = [
                [
                    "question" => "Which Indian city is known as the 'Mecca of Indian Hockey'?",
                    "correctAnswer" => "Jalandhar",
                    "answerChoices" => [
                        "Mumbai",
                        "Kolkata",
                        "Chennai",
                        "Jalandhar",
                    ]
                ],
                [
                    "question" => "What is the maximum number of players allowed on the field in a field hockey team?",
                    "correctAnswer" => "11",
                    "answerChoices" => [
                        "7",
                        "9",
                        "11",
                        "13",
                    ]
                ],
                [
                    "question" => "In which year did the Indian men's hockey team last win the Olympic gold medal?",
                    "correctAnswer" => "1980",
                    "answerChoices" => [
                        "1964",
                        "1972",
                        "1980",
                        "2000",
                    ]
                ],
                [
                    "question" => "What is the name of the prestigious field hockey tournament held annually in India since 1928?",
                    "correctAnswer" => "The Beighton Cup",
                    "answerChoices" => [
                        "The Sultan Azlan Shah Cup",
                        "The Beighton Cup",
                        "The FIH Hockey World Cup",
                        "The Hockey India League",
                    ]
                ],
                [
                    "question" => "Which Indian hockey legend is known as the 'Wizard of Hockey'?",
                    "correctAnswer" => "Dhyan Chand",
                    "answerChoices" => [
                        "Milkha Singh",
                        "Balbir Singh Sr.",
                        "Dhyan Chand",
                        "Gurbux Singh",
                    ]
                ],
                [
                    "question" => "What is the size of a standard field hockey ball in circumference (in inches)?",
                    "correctAnswer" => "8.8 to 9.2 inches",
                    "answerChoices" => [
                        "7.5 to 8 inches",
                        "9.8 to 10.2 inches",
                        "8.8 to 9.2 inches",
                        "10.5 to 11 inches",
                    ]
                ],
                [
                    "question" => "Who is the current captain of the Indian men's hockey team?",
                    "correctAnswer" => "Manpreet Singh",
                    "answerChoices" => [
                        "Sardar Singh",
                        "Harmanpreet Singh",
                        "Manpreet Singh",
                        "Rupinder Pal Singh",
                    ]
                ],
                [
                    "question" => "In which year did the Indian women's hockey team win its first Olympic medal?",
                    "correctAnswer" => "2021",
                    "answerChoices" => [
                        "2000",
                        "1984",
                        "2021",
                        "1960",
                    ]
                ],
                [
                    "question" => "What is the name of the iconic hockey stadium in Bhubaneswar, Odisha, which has hosted major hockey events?",
                    "correctAnswer" => "Kalinga Stadium",
                    "answerChoices" => [
                        "Eden Gardens",
                        "Kalinga Stadium",
                        "Wankhede Stadium",
                        "Jawaharlal Nehru Stadium",
                    ]
                ],
                [
                    "question" => "What is the term for the technique in field hockey where a player uses the rounded side of their stick to hit the ball?",
                    "correctAnswer" => "Slap Shot",
                    "answerChoices" => [
                        "Drag Flick",
                        "Slap Shot",
                        "Reverse Stick Shot",
                        "Scoop Shot",
                    ]
                ],
            ];

            $questions["Kabaddi"] = [
                [
                    "question" => "Which Indian state is often referred to as the 'Kabaddi capital of India' and has a strong tradition in the sport?",
                    "correctAnswer" => "Haryana",
                    "answerChoices" => [
                        "Kerala",
                        "Maharashtra",
                        "Haryana",
                        "Tamil Nadu",
                    ]
                ],
                [
                    "question" => "What is the term used in kabaddi for the player who enters the opponent's court to tag as many defenders as possible and return safely?",
                    "correctAnswer" => "Raider",
                    "answerChoices" => [
                        "Defender",
                        "Captain",
                        "Raider",
                        "Stopper",
                    ]
                ],
                [
                    "question" => "Which international kabaddi tournament is often referred to as the 'Kabaddi World Cup'?",
                    "correctAnswer" => "Kabaddi World Cup",
                    "answerChoices" => [
                        "Pro Kabaddi League",
                        "Asian Kabaddi Championship",
                        "Kabaddi World Cup",
                        "Commonwealth Kabaddi Championship",
                    ]
                ],
                [
                    "question" => "In kabaddi, what is the term for the line that separates the two halves of the playing area?",
                    "correctAnswer" => "Midline",
                    "answerChoices" => [
                        "Baseline",
                        "Midline",
                        "Centerline",
                        "Endline",
                    ]
                ],
                [
                    "question" => "Which Indian kabaddi player is often referred to as the 'Captain Cool' of kabaddi?",
                    "correctAnswer" => "Anup Kumar",
                    "answerChoices" => [
                        "Rahul Chaudhari",
                        "Ajay Thakur",
                        "Anup Kumar",
                        "Manjeet Chhillar",
                    ]
                ],
                [
                    "question" => "What is the name of the popular professional kabaddi league in India that features various city-based teams?",
                    "correctAnswer" => "Pro Kabaddi League (PKL)",
                    "answerChoices" => [
                        "Kabaddi Premier League (KPL)",
                        "Kabaddi Super League (KSL)",
                        "Indian Kabaddi League (IKL)",
                        "Pro Kabaddi League (PKL)",
                    ]
                ],
                [
                    "question" => "In kabaddi, what is the term for the action of a defender successfully preventing the raider from returning to their side of the court?",
                    "correctAnswer" => "Tag",
                    "answerChoices" => [
                        "Raid",
                        "Touch",
                        "Block",
                        "Tag",
                    ]
                ],
                [
                    "question" => "What is the maximum number of points a team can score in a single raid in kabaddi?",
                    "correctAnswer" => "4",
                    "answerChoices" => [
                        "2",
                        "3",
                        "4",
                        "5",
                    ]
                ],
                [
                    "question" => "Which Indian state won the most gold medals in kabaddi at the Asian Games 2018?",
                    "correctAnswer" => "Haryana",
                    "answerChoices" => [
                        "Punjab",
                        "Haryana",
                        "Kerala",
                        "Maharashtra",
                    ]
                ],
                [
                    "question" => "What is the term for the line that a raider must cross to score a point in kabaddi?",
                    "correctAnswer" => "Bonus Line",
                    "answerChoices" => [
                        "Centerline",
                        "Bonus Line",
                        "Midline",
                        "Baseline",
                    ]
                ],
            ];

            $questions["JavaScript"] = [
                [
                    "question" => "What is JavaScript primarily used for?",
                    "correctAnswer" => "Web development",
                    "answerChoices" => [
                        "Data analysis",
                        "Graphic design",
                        "Web development",
                        "Video editing",
                    ]
                ],
                [
                    "question" => "Which keyword is not used to declare variables in JavaScript?",
                    "correctAnswer" => "int",
                    "answerChoices" => [
                        "int",
                        "let",
                        "const",
                        "var",
                    ]
                ],
                [
                    "question" => "What does DOM stand for in the context of JavaScript?",
                    "correctAnswer" => "Document Object Model",
                    "answerChoices" => [
                        "Data Object Model",
                        "Document Object Model",
                        "Design Object Model",
                        "Digital Object Model",
                    ]
                ],
                [
                    "question" => "Which JavaScript function is used to print content to the web page?",
                    "correctAnswer" => "console.log()",
                    "answerChoices" => [
                        "print()",
                        "output()",
                        "display()",
                        "console.log()",
                    ]
                ],
                [
                    "question" => "What does 'NaN' stand for in JavaScript?",
                    "correctAnswer" => "Not-a-Number",
                    "answerChoices" => [
                        "No-action Needed",
                        "Not-a-Null",
                        "Not-a-Number",
                        "Never-ending",
                    ]
                ],
                [
                    "question" => "Which operator is used for strict equality in JavaScript?",
                    "correctAnswer" => "===",
                    "answerChoices" => [
                        "==",
                        "!=",
                        "==!",
                        "===",
                    ]
                ],
                [
                    "question" => "Which built-in object in JavaScript allows you to perform mathematical tasks?",
                    "correctAnswer" => "Math",
                    "answerChoices" => [
                        "Calc",
                        "Numbers",
                        "Math",
                        "Utilities",
                    ]
                ],
                [
                    "question" => "What is the purpose of 'setTimeout' in JavaScript?",
                    "correctAnswer" => "To delay the execution of a function",
                    "answerChoices" => [
                        "To stop the execution of a function",
                        "To set a recurring timer",
                        "To delay the execution of a function",
                        "To execute a function immediately",
                    ]
                ],
                [
                    "question" => "Which JavaScript framework is commonly used for building user interfaces?",
                    "correctAnswer" => "React",
                    "answerChoices" => [
                        "Angular",
                        "Vue",
                        "Ember",
                        "React",
                    ]
                ],
                [
                    "question" => "What is the purpose of 'localStorage' in JavaScript?",
                    "correctAnswer" => "To store data locally in the browser",
                    "answerChoices" => [
                        "To send data to a server",
                        "To store data on a remote server",
                        "To store data locally in the browser",
                        "To retrieve data from a database",
                    ]
                ],
            ];

            $questions["Python"] = [
                [
                    "question" => "What type of programming language is Python primarily known as?",
                    "correctAnswer" => "High-level",
                    "answerChoices" => [
                        "Low-level",
                        "Scripting",
                        "Machine code",
                        "High-level",
                    ]
                ],
                [
                    "question" => "Which of the following is a Python data type for storing a sequence of elements?",
                    "correctAnswer" => "List",
                    "answerChoices" => [
                        "String",
                        "Integer",
                        "List",
                        "Boolean",
                    ]
                ],
                [
                    "question" => "What is the purpose of an 'if' statement in Python?",
                    "correctAnswer" => "Conditional execution",
                    "answerChoices" => [
                        "Loop iteration",
                        "Function definition",
                        "Variable assignment",
                        "Conditional execution",
                    ]
                ],
                [
                    "question" => "In Python, which character is used to indicate the start of a comment?",
                    "correctAnswer" => "#",
                    "answerChoices" => [
                        "//",
                        "--",
                        "/*",
                        "#",
                    ]
                ],
                [
                    "question" => "What is the keyword used to define a function in Python?",
                    "correctAnswer" => "def",
                    "answerChoices" => [
                        "function",
                        "func",
                        "def",
                        "define",
                    ]
                ],
                [
                    "question" => "Which Python library is commonly used for data manipulation and analysis?",
                    "correctAnswer" => "Pandas",
                    "answerChoices" => [
                        "Matplotlib",
                        "Numpy",
                        "Scikit-learn",
                        "Pandas",
                    ]
                ],
                [
                    "question" => "What is the output of 'print(3 + '2')' in Python?",
                    "correctAnswer" => "Error",
                    "answerChoices" => [
                        "5",
                        "32",
                        "Error",
                        "None",
                    ]
                ],
                [
                    "question" => "Which built-in function in Python is used to calculate the length of a string or a sequence?",
                    "correctAnswer" => "len()",
                    "answerChoices" => [
                        "count()",
                        "length()",
                        "size()",
                        "len()",
                    ]
                ],
                [
                    "question" => "In Python, which of the following is not a valid variable name?",
                    "correctAnswer" => "123variable",
                    "answerChoices" => [
                        "my_variable",
                        "_variable",
                        "Variable123",
                        "123variable",
                    ]
                ],
                [
                    "question" => "What is the purpose of 'import' in Python?",
                    "correctAnswer" => "To include external modules or libraries",
                    "answerChoices" => [
                        "To export variables",
                        "To print output",
                        "To define functions",
                        "To include external modules or libraries",
                    ]
                ],
            ];

            $questions["Java"] = [
                [
                    "question" => "What is the primary use of Java?",
                    "correctAnswer" => "Application development",
                    "answerChoices" => [
                        "Database management",
                        "Web design",
                        "Application development",
                        "Digital marketing",
                    ]
                ],
                [
                    "question" => "Which keyword is used to define a class in Java?",
                    "correctAnswer" => "class",
                    "answerChoices" => [
                        "def",
                        "interface",
                        "class",
                        "struct",
                    ]
                ],
                [
                    "question" => "In Java, which data type is used to store whole numbers?",
                    "correctAnswer" => "int",
                    "answerChoices" => [
                        "float",
                        "string",
                        "int",
                        "boolean",
                    ]
                ],
                [
                    "question" => "What is the purpose of the 'static' keyword in Java?",
                    "correctAnswer" => "To create class-level variables and methods",
                    "answerChoices" => [
                        "To make a variable non-modifiable",
                        "To create instance-specific variables and methods",
                        "To create class-level variables and methods",
                        "To declare a constant value",
                    ]
                ],
                [
                    "question" => "What is the output of 'System.out.println(5 / 2)' in Java?",
                    "correctAnswer" => "2",
                    "answerChoices" => [
                        "2.5",
                        "2",
                        "2.0",
                        "Error",
                    ]
                ],
                [
                    "question" => "Which Java keyword is used to create an instance of a class?",
                    "correctAnswer" => "new",
                    "answerChoices" => [
                        "instance",
                        "create",
                        "new",
                        "instantiate",
                    ]
                ],
                [
                    "question" => "What is the Java virtual machine (JVM) responsible for?",
                    "correctAnswer" => "Executing Java bytecode",
                    "answerChoices" => [
                        "Managing memory allocation",
                        "Interpreting HTML",
                        "Executing Java bytecode",
                        "Running SQL queries",
                    ]
                ],
                [
                    "question" => "What is the default value of a boolean variable in Java?",
                    "correctAnswer" => "false",
                    "answerChoices" => [
                        "0",
                        "null",
                        "true",
                        "false",
                    ]
                ],
                [
                    "question" => "Which Java package is commonly used for handling input and output operations?",
                    "correctAnswer" => "java.io",
                    "answerChoices" => [
                        "java.util",
                        "java.lang",
                        "java.io",
                        "java.net",
                    ]
                ],
                [
                    "question" => "What is the purpose of the 'final' keyword in Java?",
                    "correctAnswer" => "To make a variable, method, or class unmodifiable",
                    "answerChoices" => [
                        "To indicate a variable is ready for use",
                        "To specify a method's return type",
                        "To make a variable, method, or class unmodifiable",
                        "To create a subclass",
                    ]
                ],
            ];

            $questions["C"] = [
                [
                    "question" => "What does the 'printf' function in C stand for?",
                    "correctAnswer" => "Print Formatted",
                    "answerChoices" => [
                        "Print Function",
                        "Print Format",
                        "Print File",
                        "Print Formatted",
                    ]
                ],
                [
                    "question" => "Which data type is used to store single characters in C?",
                    "correctAnswer" => "char",
                    "answerChoices" => [
                        "int",
                        "string",
                        "char",
                        "float",
                    ]
                ],
                [
                    "question" => "In C, which operator is used for logical NOT?",
                    "correctAnswer" => "!",
                    "answerChoices" => [
                        "&",
                        "&&",
                        "|",
                        "!",
                    ]
                ],
                [
                    "question" => "What is the purpose of 'scanf' function in C?",
                    "correctAnswer" => "To read input from the user",
                    "answerChoices" => [
                        "To print output to the screen",
                        "To perform mathematical operations",
                        "To read input from a file",
                        "To read input from the user",
                    ]
                ],
                [
                    "question" => "Which symbol is used to denote a single-line comment in C?",
                    "correctAnswer" => "//",
                    "answerChoices" => [
                        "/*",
                        "#",
                        "//",
                        "--",
                    ]
                ],
                [
                    "question" => "What is the maximum value that can be stored in an 'int' data type in C?",
                    "correctAnswer" => "It depends on the platform and compiler",
                    "answerChoices" => [
                        "255",
                        "65535",
                        "2^31 - 1",
                        "It depends on the platform and compiler",
                    ]
                ],
                [
                    "question" => "Which C library function is used to allocate memory dynamically?",
                    "correctAnswer" => "malloc()",
                    "answerChoices" => [
                        "calloc()",
                        "realloc()",
                        "malloc()",
                        "free()",
                    ]
                ],
                [
                    "question" => "In C, which operator is used to access the value at a pointer's address?",
                    "correctAnswer" => "*",
                    "answerChoices" => [
                        "&",
                        "*",
                        "->",
                        ">>",
                    ]
                ],
                [
                    "question" => "What is the purpose of the 'break' statement in a 'switch' statement in C?",
                    "correctAnswer" => "To exit the 'switch' statement",
                    "answerChoices" => [
                        "To continue to the next case",
                        "To execute a default case",
                        "To exit the program",
                        "To exit the 'switch' statement",
                    ]
                ],
                [
                    "question" => "Which C standard library function is used to compare two strings?",
                    "correctAnswer" => "strcmp()",
                    "answerChoices" => [
                        "strcat()",
                        "strlen()",
                        "strcpy()",
                        "strcmp()",
                    ]
                ],
            ];





            // Initialize variables for score and question results
            $score = 0;
            $questionResults = [];

            // Display questions based on the selected subtopic
            if (isset ($questions[$selectedSubtopic])) {
                $questionNumber = 1;
                foreach ($questions[$selectedSubtopic] as $questionData) {
                    $question = $questionData["question"];
                    $correctAnswer = $questionData["correctAnswer"];
                    $answerChoices = $questionData["answerChoices"];

                    // Check if the user's answer is correct
                    $userAnswer = isset ($_POST["q$questionNumber"]) ? $_POST["q$questionNumber"] : "";
                    $result = ($userAnswer === $correctAnswer) ? "Correct" : "Wrong";
                    if ($result === "Correct") {
                        $score++;
                    }

                    // Store question results
                    $questionResults[] = [
                        "question" => $question,
                        "userAnswer" => $userAnswer,
                        "correctAnswer" => $correctAnswer,
                        "result" => $result,
                    ];

                    echo "<h2>Question $questionNumber</h2>";
                    echo "<p>$question</p>";

                    // Display answer choices
                    foreach ($answerChoices as $answer) {
                        echo '<input type="radio" name="q' . $questionNumber . '" value="' . $answer . '"> ' . $answer . '<br>';
                    }

                    $questionNumber++;
                }
            }
        }
        ?>

        <!-- Hidden fields to pass data to result.php -->
        <input type="hidden" name="selectedTopic" value="<?php echo $selectedTopic; ?>">
        <input type="hidden" name="selectedSubtopic" value="<?php echo $selectedSubtopic; ?>">

        <input type="submit" value="Submit">
    </form>
</body>

</html>