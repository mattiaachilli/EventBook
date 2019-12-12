<div class="row">
    <div class="col-2"></div>
    <div class="col-12 col-lg-8 p-0">
        <h2 class="text-light display-4">Lista eventi da approvare</h2>
        <div class = "table-div form-div rounded">
        <?php if(count($parameters["events"]) >= 1): ?>
            <table class="table text-white border-bottom" id = "table">
                <thead>
                    <tr>
                        <th class = "border-0 text-center" id = "organizzatore" scope="col">Organizzatore</th>
                        <th class = "border-0 text-center" id = "evento" scope="col">Evento</th>
                        <th class = "border-0 text-center" id = "buttons" scope = "col">Approvare evento?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($parameters["events"] as $event): ?>
                        <tr>
                            <td headers = "organizzatore" class = "text-center pt-4"><?php echo $event["Username"]?></td>
                            <td headers = "evento" class = "text-center pt-4">
                                <form action = "../php/eventInfo.php" method = "post">
                                    <button type="submit" class="btn-title bg-transparent text-white border-0">
                                        <?php echo $event["Nome_evento"]?>
                                    </button>
                                    <input type = "hidden" name = "ID" value = "<?php echo $event["IDevento"]?>">
                                </form>
                            </td>
                            <td headers = "buttons" class = "text-center row m-0 pt-3">
                                <form class = "button-form text-center row container-fluid mt-0" action = "../api/api-approvation.php" method = "post">
                                    <div class = "col-6 p-1">
                                        <button type="submit" class="yButton btn btn-primary container-fluid">Sì</button>
                                        <em class = "fas fa-check fa-2x d-none"></em>
                                    </div>
                                    <div class = "col-6 p-1">
                                        <button type="submit" class="fButton btn btn-primary container-fluid">No</button>
                                        <em class = "fas fa-times fa-2x d-none"></em>
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
<div class="row mb-5">
    <div class="col-sm-10 col-xs-12 text-right">
        <button onclick="history.back();" type="submit" class="btn btn-primary"><em class="fas fa-arrow-left"></em> back</button> 
    </div>
    <div class="col-sm-2 col-xs-0"></div>
</div>