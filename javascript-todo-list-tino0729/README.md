[![Open in Codespaces](https://classroom.github.com/assets/launch-codespace-7f7980b617ed060a017424585567c406b6ee15c891e84e1186181d67ecf80aa0.svg)](https://classroom.github.com/open-in-codespaces?assignment_repo_id=13532520)
# Lab: JavaScript ToDo List

In your index.html file: be sure to link to the JavaScript file. I have not done that for you in the starter files.

In your todolist.js, I have provided comments that follow the format of my solution. If you do not find this helpful you may erase them and start from scratch. The complete lab must:

- Take input from the text field and add a new list item to the task list when the Add Task button is clicked.
  - Any whitespace at the beginning or end of the text should be trimmed.
  - If no text was entered, do not add an empty task.
- When an incomplete task item is clicked, the CSS class "completed" should be applied. When a completed task item is clicked the CSS class "completed" should be removed.
  - You can achieve this effect with the "classList.toggle" function on the HTMLElement.
- When a task item is double clicked the item should be removed from the list.
