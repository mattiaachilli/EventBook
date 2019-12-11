<div class="row">
    <div class="col-2"></div>
    <div class="col-12 col-lg-8 p-0">
        <h2 class="text-light display-4">Lista eventi da approvare</h2>
        <div class = "form-div rounded">
        <?php if(count($parameters["events"]) >= 1): ?>
            <table class="table text-white border-bottom" id = "table">
                <thead>
                    <tr>
                        <th class = "border-top-0 text-center" id = "organizzatore" scope="col">Organizzatore</th>
                        <th class = "border-top-0 text-center" id = "evento" scope="col">Evento</th>
                        <th class = "border-0 text-center" id = "buttons" scope = "col">Approvare evento?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($parameters["events"] as $event): ?>
                        <tr>
                            <td headers = "organizzatore" class = "text-center"><?php echo $event["Username"]?></td>
                            <td headers = "evento" class = "text-center">
                                <form id="info">
                                    <a href = "../php/eventInfo.php?ID=<?php echo $event["IDevento"];?>">
                                        <?php echo $event["Nome_evento"]?>
                                    </a>
                                </form>
                            </td>
                            <td headers = "buttons" class = "text-center row m-0">
                                <form class = "text-center row container-fluid mt-0" action = "../api/api-approvation.php" id = "button-form" type = "post">
                                    <div class = "col-6">
                                        <button type="submit" class="yButton btn btn-primary container-fluid">Sì</i></button>
                                        <i class = "fas fa-check fa-2x d-none"></i>
                                    </div>
                                    <div class = "col-6">
                                        <button type="submit" class="fButton btn btn-primary container-fluid">No</i></button>
                                        <i class = "fas fa-times fa-2x d-none"></i>
                                    </div>
                                    <input type = "hidden" value = "<?php echo $event["IDevento"]?>">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="col-12 text-center font-weight-light font-italic text-white">Non ci sono eventi da approvare</div>'
        <?php endif; ?>
        </div>
    </div>
    <div class="col-2"></div>
</div>