# Notes
Simple REST API for writing notes using some of the Appwrite preferred tools and libraries(Swoole,Utopia), named **"Notes"**.<br/>
Written in **PHP**.


## #HOWTO
 - [ ] Install Docker(Locally / Remote).
 - [ ] Lunch your terminal.
 - [ ] Git clone this repository.
 - [ ] Run: docker build -t notesapi.
 - [ ] Run: docker run -d -p 6000:80 notesapi.
 Done.
 
 ## #ENDPOINTS
 GET - api/notes - Return all notes.<br/>
 GET - api/notes?note_id={note id} - Return specific note data.<br/>
 POST - api/notes?user_id={user id}&content={content info} - Create note.<br/>
 PUST - api/notes?note_id={note id} - Update content of specific note.<br/>
 DELETE - api/notes?note_id={note id} - Delete note with note_id=={note id}. <br/>
 
 ## Futrue entity's goals/features
  * Finish working on JSON abstraction.
  * Add a possbility to write note for teams.
  * Build a task oriented notes - automate admin future actions.
  * Add a note's reminder.
  
  
