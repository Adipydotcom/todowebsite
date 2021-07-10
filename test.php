
    


<?php
include 'head.php';

?>

 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="edittitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edittitle" aria-describedby="emailHelp">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="edit_text_area"></textarea>
                            <label for="floatingTextarea">Description</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>



    sno = e.target.id.substr(1,)
            if(confirm("Press Button for Delete"))
            {
                window.location = `index.php?delete = ${sno}`;
            }
            else
            {
                console.log("NO");
            }
            task.php?catId='.$ref_del.'?delete='.$sno.'

            <a href=""> <button type="button" class="btn btn-danger delbtn" id="'. $ref_del.'" name="deletebtn">Delete</button> </a> 




            # DO NOT REMOVE THIS LINE AND THE LINES BELLOW SSL_REDIRECT:adpto.store
RewriteEngine on
RewriteCond %{HTTPS} off
RewriteCond %{HTTP_HOST} (www\.)?adpto.store
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
# DO NOT REMOVE THIS LINE AND THE LINES BELLOW SSL_REDIRECT:adpto.store
