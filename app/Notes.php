<?php

use Utopia\App;
use Utopia\Exception;
use Utopia\Response;
use Utopia\Swoole\Request;
use Utopia\CLI\Console;
use Utopia\Validator\Text;
use Utopia\Validator\Integer;
use Utopia\Validator\Range;



// GET all notes OR get a specific note by note_id
// @param user_id - user id
// @param content - new note content.
App::get('api/notes')
    ->desc('All Notes or a specific note by note id')
    ->action(function ($request ,$response) {
        //$dbRef = new CRUDJson();
        $id = $request->getParam("note_id");
        if ($id == NULL || $id == "") {
          $response
          ->setStatusCode(Response::STATUS_CODE_OK)
          ->json([
            "data" => ["Notes" =>[["note_id"=>"11","user_id"=>"1111","content"=>"first note for user"],
            ["note_id"=>"22","user_id"=>"2222","content"=>"second note for user"],
            ["note_id"=>"33","user_id"=>"3333","content"=>"content"]]]
          ]);  
        }	else {
          $response
          ->setStatusCode(Response::STATUS_CODE_OK)
          ->json([
            "data" => ["Note" =>["note_id"=>"33","user_id"=>"3333","content"=>"content"]]
          ]);     
        }
          
  }, ['request', 'response']);

  
// Create New Note
// @param user_id - user id
// @param content - new note content.
App::post('api/notes')
    ->desc('Create a new note')
    ->action(function ($request,$response) {
        //$dbRef = new CRUDJson();
        $note_id = "newid";
        $user = $request->getPayload("user_id");
        $content = $request->getPayload("content");
        if(!isset($user) || !isset($content)){
            $response
              ->setStatusCode(Response::STATUS_CODE_BAD_REQUEST)
              ->json([	
                "status" => "Fail",
                "msg" => "User id is needed"
            ]);
        }
        // Update DB and send respond
        $response
          ->setStatusCode(Response::STATUS_CODE_CREATED)
          ->json([
            "status" => "Success",
            "data" => ["New Note" =>["note_id"=>$note_id,"user_id"=>$user,"content"=>$content]]
         ]);
  }, ['request','response']);

// Update Note Content
// @param user_id - user id
// @param content - new note content.
// @return - JSON of updated list of notes 
App::put('api/notes')
    ->desc('Update note')
    ->action(function ($request, $response) {
        //$dbRef = new CRUDJson();
        $note_id = $request->getQuery("note_id");	
        $content = "new updated content"; 
        if(!isset($note_id)){
            $response
              ->setStatusCode(Response::STATUS_CODE_BAD_REQUEST)
              ->json([  
                "status" => "Fail",
                "msg" => "Note id is needed"
            ]);
        }
        //$dbRef->updateDocument($note_id,$content);
        $response
          ->setStatusCode(Response::STATUS_CODE_OK)
          ->json([
            "status" => "Success",
             "data" => ["Notes" =>[["note_id"=>"11","user_id"=>"1111","content"=>"first note for user"],
            ["note_id"=>"22","user_id"=>"2222","content"=>"second note for user"],
            ["note_id"=>"33","user_id"=>"3333","content"=>"content"]]]
          ]);       
		}, ['request', 'response']);

// Delete Note
// @param note_id
// @return - NULL
App::delete('api/notes')
    ->desc('Delete note')
    ->action(function ($request, $response) {
    //$dbRef = new CRUDJson();
    $note_id = $request->getQuery("note_id");
    if(isset($note_id)){
      //$dbRef->deleteDocument($note_id);
    }
    $response  	
      ->setStatusCode(Response::STATUS_CODE_NOCONTENT)
      ->json([
        "status" => "success",
        "data" => null
      ]);
  }, ['request', 'response']);





// -------
// JSON CRUB Backend Abstraction Class
// -------
// class CRUDJson {

//   public $db = "db.json";
//   /// setDocument
//   // SET - ADD NEW DOC
//   function setDocument(String $noteId, String $userId, String $description) {
//       $jsonString = file_get_contents("db.json"); 
//       $data = (array)json_decode($jsonString, true);
//     $newData = array(
//       "id"      => $noteId,
//       "user_id"    => $userId,
//       "content" => $description
//     );
//     array_push($data,$newData);
//     $json = json_encode($data, JSON_PRETTY_PRINT);

//     if (file_put_contents("db.json",$json)) {
//       $json_note = json_encode($newData, JSON_PRETTY_PRINT);
//       return $json_note;
//     }else{
//       return NULL;
//     }
//   }
//   // GET - get document by noteId
//   function getDocument(String $documentID) {
//     $jsonString = file_get_contents("db.json"); 
//     $data = (array)json_decode($jsonString, true);
//     foreach ($data as $key => $val) {
//       if (strcmp($val["id"],$documentID) == 0) {
//         $json = json_encode($val, JSON_PRETTY_PRINT);
//           return  $json;
//       }
//     }
//   }
//   //GET - Get all notes from JSON FILE
//   function getAll() {
//     $json = $json_decode(file_get_contents('db.json'), true);
//     return $json;
//   }
//   // UPDATE - Update content of note by note ID
//   function updateDocument(String $documentID, String $newDescription) {
//     $jsonString = file_get_contents("db.json"); 
//     $data = (array)json_decode($jsonString, true);
//     $current = NULL;
//     foreach ($data as $key => $value) {
//       if (strcmp($value["id"],$documentID)==0) {
//         $data[$key]["content"] = $newDescription;
//         $current = $data[$key];
//       }
//     }
//     $json = json_encode($data, JSON_PRETTY_PRINT);
//     $current_json = json_encode($current, JSON_PRETTY_PRINT);
//     if(file_put_contents("db.json", $json)) 
//     {
//       return  $current_json;
//     } else {
//       return NULL;
//     }
//   }
//   // DELETE - Delete note by note ID
//   function deleteDocument(String $documentID) {
//     $jsonString = file_get_contents("db.json"); 
//     $data = (array)json_decode($jsonString, true);
//     $arr_index = array();
//     foreach ($data as $key => $value) {
//      if (strcmp($value['id'],$documentID) == 0) {
//           $arr_index[] = $key;
//      }
//      }
//     foreach ($arr_index as $key) {
//       unset($data[$key]);
//     }
//     $json_arr = array_values($data);
//     $json = json_encode($json_arr, JSON_PRETTY_PRINT);
//     if(file_put_contents("db.json", $json)) 
//     {
//       return  $json;
//     }else{
//       return NULL;
//     }
//   }


// } 




		