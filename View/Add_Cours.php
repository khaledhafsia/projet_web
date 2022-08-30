<?php
require "../Controller/CoursC.php";
$X=get_all_matieres();
if (isset($_POST["Titre"]) && isset($_POST["Contenu"]) && isset($_POST["File"]) && isset($_POST["Matiere"]) && isset($_POST["E"]))
{

}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3>
                Add Cours

            </h3>
            <form role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">
                        Title
                    </label>
                    <input type="input" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">
                        Content
                    </label>
                    <input type="text" class="form-control" id="textcontents">
                </div>
                <label for="Matieres">Choisir une Matière :</label>

                <select name="Matieres" id="Matieres">
                    <?php
                     foreach ($X as $M)
                         {
                             ?>
                    <option value="<?php echo $M->getId(); ?>"><?php echo $M->getTitre(); ?></option>
                    <?php
                    }?>
                </select>
                <div class="form-group">

                    <label for="exampleInputFile">
                        File input
                    </label>
                    <input type="file" class="form-control-file" id="exampleInputFile">

                </div>

                <button type="submit" class="btn btn-success">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>