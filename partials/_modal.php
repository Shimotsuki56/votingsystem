<!-- Modal -->


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
                
                <form action='http://localhost/anurag/Voting%20system/partials/_loginHandler.php?' method='post' autocomplete="off">
                    <div class="mb-3">
                      <label for="voter_username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="voter_username" name='voter_username' aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                      <label for="voter_password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="voter_password" name="voter_password">
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="showPass">
                      <label class="form-check-label" for="showPass">Show Password</label>
                    </div>
                    <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                  </form>
                  
            </div>
        </div>
      
    </div>
  </div>

  <script>
    let pass=document.getElementById('voter_password');
    let showPass=document.getElementById('showPass');

    showPass.addEventListener('click',()=>{
      if(pass.type=="password"){
        pass.type="text";
      }else{
        pass.type="password";
      }
    })
  </script>