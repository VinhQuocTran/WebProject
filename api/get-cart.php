<?php
    require_once ('connection.php');
    if(!isset($_SESSION['ticket_in_cart'])){
        $_SESSION['ticket_in_cart'] = array();
      }
    if(count($_SESSION["ticket_in_cart"])==0){
        die();
    }
    $ticket_in_cart = implode(",", $_SESSION["ticket_in_cart"]);

    $sql = "SELECT * FROM ticket,flight 
            where  ticket.FlightCode = flight.FlightCode 
            AND TicketID in (".$ticket_in_cart.")";
    try{
        $stmt = $dbCon->prepare($sql);
        $stmt->execute();
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $timestamp = strtotime($row['DepartureDate']);
        $new_date = date("d/m/Y", $timestamp);
        echo '<tr scope="row" class="InCard">
                    <td>' . $row['FlightCode'] . '</td>
                    <td>' . $new_date . '</td>
                    <td>' . $row['TakeoffTime'] . '</td>
                    <td>
                        <input class="col-5 numEcoSeat" value=1 type="number" name="numEcoSeat" id="numEcoSeat">
                    </td>
                    <td>
                        <input class="col-5 numBusSeat" value=0 type="number" name="numBusSeat" id="numBusSeat">
                    </td>
                    <td class="EcoPrice">' . number_format($row['EcoPrice']) . ' đ</td>
                    <td class="BusPrice">' . number_format($row['BusPrice']) . ' đ</td>
                    <td class="totalCost">' . number_format($row['EcoPrice']) . ' đ</td>
                    <td class="d-flex justify-content-center">
                    <button class="btn btn-danger me-2 delete-ticket" id = "' . $row['TicketID'] . '">Xóa</button>
                    </td>
                </tr>
            ';
    }
?>