# Notes
Simple REST API for writing notes using some of the Appwrite preferred tools and libraries(Swoole,PHP,Utopia), named **"Notes"**.<br/>
Written in **PHP**.


## #HOWTO
 - [x] Install Docker Engine.
 - [x] Open your terminal.
 - [x] Git clone this repository.
 - [x] Run: docker build -t notesapi.
 - [x] Run: docker run -d -p 6000:80 notesapi.
 - Done.
 
 ## #ENDPOINTS
 GET - api/notes - return all notes.
 GET - api/notes?note_id={note id} - return specific note data.
 POST - api/notes?user_id={user id}&content={content info} - create note.
 PUST - api/notes?note_id={note id} - update content of specific note.
 DELETE - api/notes?note_id={note id} - delete note with note_id=={note id}. 
 
 ## Futrue entity's goals/features
  * Finish working on JSON abstraction.
  * Add a possbility to write note for teams.
  * Build a task oriented notes - automate admin future actions.
  * Add a note's reminder.
  
  
  

