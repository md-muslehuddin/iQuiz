
/* Code for select */
// Get references to both select elements
var topicSelect = document.getElementById("topic");
var subtopicSelect = document.getElementById("subtopic");

// Define subtopics for each main topic
var subtopics = {
    select: ["----------select----------"],
    Technology: ["Computer History", "Internet", "Smartphones", "Artificial intelligence"],
    GeneralKnowledge: ["Modern History", "Literature", "Politics & Economics", "Science Facts"],
    Sports: ["Football", "Cricket", "Hockey", "Kabaddi"],
    ProgrammingLanguage: ["JavaScript", "Python", "Java", "C"],
};

// Function to populate subtopic options based on the selected topic
function updateSubtopics() {
    var selectedTopic = topicSelect.value;
    var subtopicOptions = subtopics[selectedTopic] || [];

    // Clear existing options
    subtopicSelect.innerHTML = "";

    // Add new options
    subtopicOptions.forEach(function (subtopic) {
        var option = document.createElement("option");
        option.value = subtopic;
        option.textContent = subtopic;
        subtopicSelect.appendChild(option);
    });
}

// Add an event listener to the topic select element
topicSelect.addEventListener("change", updateSubtopics);

// Initialize subtopics based on the initial selected topic
updateSubtopics();

/* Code for valid topic */

var form = document.getElementById("myForm");
var topicSelect = document.getElementById("topic");
var subtopicSelect = document.getElementById("subtopic");
var validationTopic = document.getElementById("validationTopic");

form.addEventListener("submit", function (event) {
    if (topicSelect.value === "select" || subtopicSelect.value === "") {
        validationTopic.textContent = "Please select both a topic and a subtopic.";
        validationTopic.style.color = "red";
        event.preventDefault(); // Prevent form submission
    } else {
        validationTopic.textContent = ""; // Clear validation message
    }
    hideAlert();
});

/* Code for hide */
function hideAlert() {
    setTimeout(function () {
        document.getElementById("validationTopic").textContent = "";
    }, 3000);
}

/* ---new------ */
/* Code to get the selected subtopic */
subtopicSelect.addEventListener("change", function () {
    var selectedSubtopic = subtopicSelect.value;
    console.log("Selected Subtopic: " + selectedSubtopic);
    // You can use the selectedSubtopic as needed in your application
});