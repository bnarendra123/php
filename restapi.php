  <?php
  /* another method */
  public function test()
   {
        $names = array();
    $names[] = 'Test';
    $names[] = 'Hai';
    
    foreach($names as $q){
       $result[] = array(
                            "result"=>$q,                           
                            
                            );
    }
                             echo '[{"status":1,"result":'.json_encode($result).'}]';
   }

/* end another method */

/* another method  */

  public function updatesocialmedia()
    {
        $userid=$this->input->post('user_id');
        if($userid!=''){
            $smedia=array(
                'facebook'=>$this->input->post('facebook'),
                'twitter'=>$this->input->post('twitter'),
                'google_plus'=>$this->input->post('google_plus')
                );
        $this->db->where('user_id',$userid);
        $query=$this->db->update('user_profile',$smedia);
              if($query){
            $msg['status'] = "success";
            $msg['message'] = "Social Media Details Updated Successfully.";  

                    }}else{
            $msg['status'] = "fail";
            $msg['message'] = "Fail To Update Socail Media."; 
 
                 }
                 echo json_encode($msg);
    }

 /* end another method */

    /* another method */

      public function editemail_address()
    {
        
        $userid=$this->input->post('user_id');
        if($userid!=''){
        $this->db->where('id',$userid);
        $query=$this->db->get('user_reg')->row()->email;
        
            
        $result = array(
                            "Email"=> $query,                           
                            
                            );
        
              if($query != null){

                  echo '[{"status":1,"result":'.json_encode($result).'}]';


                    } }else{

                           echo '[{"status":0,"result":"No Results Found"}]';
 
                 }
    }

    /* end another method */

?>


    if we want to run this url : http://localhost/test(foldername)/test(functionname)