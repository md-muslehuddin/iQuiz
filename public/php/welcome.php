<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iQuiz: The Ultimate iQuiz Experience</title>
    <link rel="icon" href="public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/welcome.css">
</head>

<body>
    <form action="quiz.php" method="post" id="myForm">
        <h2 id="title">Choose your Favourite Category</h2><br>
        <label for="topic">Select a Topic<span style="color:red; font-weight:bolder;">*</span></label>
        <select id="topic" name="topic" required>
            <option value="select">----------select----------</option>
            <option value="Technology">Technology</option>
            <option value="GeneralKnowledge">General Knowledge</option>
            <option value="Sports">Sports</option>
            <option value="ProgrammingLanguage">Programming Language</option>
        </select><br><br>

        <label for="subtopic">Select a Subtopic<span style="color:red; font-weight:bolder;">*</span></label>
        <select id="subtopic" name="subtopic" required>

        </select><br>
        <p id="validationTopic" class="validation"></p><br>

        <input type="submit" value="Submit" id="submit">

    </form>

    <script src="../js/welcome.js"></script>
</body>

</html>