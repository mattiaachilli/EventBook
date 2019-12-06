<div class="row">
    <div class="col-2"></div>
    <div class="col-12 col-lg-8 p-0">
        <h2 class="text-light display-4 text-center mb-5">Lista eventi da approvare</h2>
        <div class = "form-div rounded">
            <table class="table text-white border-bottom" id = "table">
                <thead>
                    <tr>
                        <th class = "border-top-0 text-center" id = "organizzatore" scope="col">Organizzatore</th>
                        <th class = "border-top-0 text-center" id = "evento" scope="col">Evento</th>
                        <th class = "border-0 text-center" id = "buttons" scope = "col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($parameters["events"] as $event): ?>
                        <tr>
                            <td headers = "organizzatore" class = "text-center"><?php echo $event["Username"]?></td>
                            <td headers = "evento" class = "text-center"><?php echo $event["Nome_evento"]?></td>
                            <td headers = "buttons" class = "text-center row m-0">
                                <form class = "text-center row container-fluid mt-0" action = "../api/api-approvation.php" class = "button-form" type = "post">
                                    <div class = "col-6">
                                        <button type="submit" class="yButton btn btn-primary container-fluid">Y</button>
                                    </div>
                                    <div class = "col-6">
                                        <button type="submit" class="fButton btn btn-primary container-fluid">N</button>
                                    </div>
                                    <input type = "hidden" value = "<?php echo $event["IDevento"]?>">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-2"></div>
</div>