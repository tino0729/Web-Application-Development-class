// Wrap everything in the DOMContentLoaded event handler.

  // Get the input, button, and list elements and store them in constants.
  // We will need to reference these elements later,
  // so we fetch them once ahead of time.

  // Add an event listener to the "add task" button for the click event.

    // Get the task description from the input element.

    // If the description isn't empty:

      // Create a new LI element and add it to the list.

      // Clear the input element text.
      
	//
  // 

  // Handle the click event for the task list.
  
    // If the event.target.tagName shows that the click was on a LI:
	
      // Toggle the completed class on that element using
	  // event.target.classList.toggle
	
	//
  //

  // Handle the dblclick event for the task list.

    // If the event.target.tagName shows that the click was on a LI:
      // Remove the item from the task list using the event.target
	  // property.

    //
  //
//

document.addEventListener('DOMContentLoaded', function () {
  
  const newTaskInput = document.getElementById('newTaskInput');
  const addTaskButton = document.getElementById('addTaskButton');
  const taskList = document.getElementById('taskList');

  
  addTaskButton.addEventListener('click', function () {
    
    const taskDescription = newTaskInput.value.trim();

    
    if (taskDescription !== '') {
      // Create a new LI element and add it to the list.
      const newTaskItem = document.createElement('li');
      newTaskItem.textContent = taskDescription;
      taskList.appendChild(newTaskItem);

      
      newTaskInput.value = '';
    }
  });

  
  taskList.addEventListener('click', function (event) {
    
    if (event.target.tagName === 'LI') {
      
      
      event.target.classList.toggle('completed');
    }
  });

  
  taskList.addEventListener('dblclick', function (event) {
    
    if (event.target.tagName === 'LI') {
      
      event.target.remove();
    }
  });
});
