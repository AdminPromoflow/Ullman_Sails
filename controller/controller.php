<?php
class ApiHandlerSendForms {
    public function handleRequest() {
        header('Content-Type: application/json');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = isset($_POST['action']) ? $_POST['action'] : null;

            if ($action === null) {
                http_response_code(400);
                echo json_encode(array(
                    "success" => false,
                    "message" => "Missing action"
                ));
                return;
            }

            switch ($action) {
                case "send_emal_contact_us":
                    $this->handleContactUs();
                    break;

                // case "send_new_cover_quote":
                //     $this->handleNewCoverQuote();
                //     break;
                //
                // case "send_new_repair_quote":
                //     $this->handleNewRepairQuote();
                //     break;
                //
                // case "send_new_sail_quote":
                //     $this->handleNewSailQuote();
                //     break;

                default:
                    http_response_code(400);
                    echo json_encode(array(
                        "success" => false,
                        "message" => "Unknown action"
                    ));
                    break;
            }
        } else {
            http_response_code(405);
            echo json_encode(array(
                "success" => false,
                "message" => "Method not allowed"
            ));
        }
    }

    private function handleContactUs() {
        $contactName = isset($_POST['contactName']) ? $_POST['contactName'] : null;
        $contactNumber = isset($_POST['contactNumber']) ? $_POST['contactNumber'] : null;
        $contactLocation = isset($_POST['contactLocation']) ? $_POST['contactLocation'] : null;
        $contactEmail = isset($_POST['contactEmail']) ? $_POST['contactEmail'] : null;
        $contactMessage = isset($_POST['contactMessage']) ? $_POST['contactMessage'] : null;

        $file = isset($_FILES['file']) ? $_FILES['file'] : null;

        $data = (object) array(
            "action" => isset($_POST['action']) ? $_POST['action'] : null,
            "contactName" => $contactName,
            "contactNumber" => $contactNumber,
            "contactLocation" => $contactLocation,
            "contactEmail" => $contactEmail,
            "contactMessage" => $contactMessage,
            "file" => $file
        );

        $emailSender = new EmailSender();
        $emailSent = $emailSender->sendEmailContactUs($data);
        echo json_encode($emailSent);
    }

    // private function handleNewCoverQuote() {
    //     $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : null;
    //     $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : null;
    //     $email = isset($_POST['email']) ? $_POST['email'] : null;
    //     $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    //     $address1 = isset($_POST['address_1']) ? $_POST['address_1'] : null;
    //     $address2 = isset($_POST['address_2']) ? $_POST['address_2'] : null;
    //     $city = isset($_POST['city']) ? $_POST['city'] : null;
    //     $postcode = isset($_POST['postcode']) ? $_POST['postcode'] : null;
    //     $contactByPhone = isset($_POST['contact_by_phone']) ? $_POST['contact_by_phone'] : "0";
    //     $contactByEmail = isset($_POST['contact_by_email']) ? $_POST['contact_by_email'] : "0";
    //     $boatType = isset($_POST['boat_type']) ? $_POST['boat_type'] : null;
    //     $sailType = isset($_POST['sail_type']) ? $_POST['sail_type'] : null;
    //     $boatLocation = isset($_POST['boat_location']) ? $_POST['boat_location'] : null;
    //     $additionalInfo = isset($_POST['additional_info']) ? $_POST['additional_info'] : null;
    //     $newsletter = isset($_POST['newsletter']) ? $_POST['newsletter'] : "0";
    //
    //     $data = (object) array(
    //         "action" => isset($_POST['action']) ? $_POST['action'] : null,
    //         "first_name" => $firstName,
    //         "last_name" => $lastName,
    //         "email" => $email,
    //         "phone" => $phone,
    //         "address_1" => $address1,
    //         "address_2" => $address2,
    //         "city" => $city,
    //         "postcode" => $postcode,
    //         "contact_by_phone" => $contactByPhone,
    //         "contact_by_email" => $contactByEmail,
    //         "boat_type" => $boatType,
    //         "sail_type" => $sailType,
    //         "boat_location" => $boatLocation,
    //         "additional_info" => $additionalInfo,
    //         "newsletter" => $newsletter
    //     );
    //
    //     $emailSender = new EmailSender();
    //     $emailSent = $emailSender->sendNewCoverQuote($data);
    //     echo json_encode($emailSent);
    // }
    //
    // private function handleNewRepairQuote() {
    //     $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : null;
    //     $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : null;
    //     $email = isset($_POST['email']) ? $_POST['email'] : null;
    //     $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    //     $address1 = isset($_POST['address_1']) ? $_POST['address_1'] : null;
    //     $address2 = isset($_POST['address_2']) ? $_POST['address_2'] : null;
    //     $city = isset($_POST['city']) ? $_POST['city'] : null;
    //     $postcode = isset($_POST['postcode']) ? $_POST['postcode'] : null;
    //     $contactByPhone = isset($_POST['contact_by_phone']) ? $_POST['contact_by_phone'] : "0";
    //     $contactByEmail = isset($_POST['contact_by_email']) ? $_POST['contact_by_email'] : "0";
    //     $boatType = isset($_POST['boat_type']) ? $_POST['boat_type'] : null;
    //     $boatName = isset($_POST['boat_name']) ? $_POST['boat_name'] : null;
    //     $sailType = isset($_POST['sail_type']) ? $_POST['sail_type'] : null;
    //     $workLaundry = isset($_POST['work_laundry']) ? $_POST['work_laundry'] : "0";
    //     $workService = isset($_POST['work_service']) ? $_POST['work_service'] : "0";
    //     $workRepair = isset($_POST['work_repair']) ? $_POST['work_repair'] : "0";
    //     $workDetails = isset($_POST['work_details']) ? $_POST['work_details'] : null;
    //     $boatLocation = isset($_POST['boat_location']) ? $_POST['boat_location'] : null;
    //     $collectionDelivery = isset($_POST['collection_delivery']) ? $_POST['collection_delivery'] : null;
    //     $newsletter = isset($_POST['newsletter']) ? $_POST['newsletter'] : "0";
    //
    //     $data = (object) array(
    //         "action" => isset($_POST['action']) ? $_POST['action'] : null,
    //         "first_name" => $firstName,
    //         "last_name" => $lastName,
    //         "email" => $email,
    //         "phone" => $phone,
    //         "address_1" => $address1,
    //         "address_2" => $address2,
    //         "city" => $city,
    //         "postcode" => $postcode,
    //         "contact_by_phone" => $contactByPhone,
    //         "contact_by_email" => $contactByEmail,
    //         "boat_type" => $boatType,
    //         "boat_name" => $boatName,
    //         "sail_type" => $sailType,
    //         "work_laundry" => $workLaundry,
    //         "work_service" => $workService,
    //         "work_repair" => $workRepair,
    //         "work_details" => $workDetails,
    //         "boat_location" => $boatLocation,
    //         "collection_delivery" => $collectionDelivery,
    //         "newsletter" => $newsletter
    //     );
    //
    //     $emailSender = new EmailSender();
    //     $emailSent = $emailSender->sendNewRepairQuote($data);
    //     echo json_encode($emailSent);
    // }
    //
    // private function handleNewSailQuote() {
    //     $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : null;
    //     $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : null;
    //     $email = isset($_POST['email']) ? $_POST['email'] : null;
    //     $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
    //     $address1 = isset($_POST['address_1']) ? $_POST['address_1'] : null;
    //     $address2 = isset($_POST['address_2']) ? $_POST['address_2'] : null;
    //     $city = isset($_POST['city']) ? $_POST['city'] : null;
    //     $postcode = isset($_POST['postcode']) ? $_POST['postcode'] : null;
    //     $contactByPhone = isset($_POST['contact_by_phone']) ? $_POST['contact_by_phone'] : "0";
    //     $contactByEmail = isset($_POST['contact_by_email']) ? $_POST['contact_by_email'] : "0";
    //     $boatType = isset($_POST['boat_type']) ? $_POST['boat_type'] : null;
    //     $sailType = isset($_POST['sail_type']) ? $_POST['sail_type'] : null;
    //     $sailUseRacing = isset($_POST['sail_use_racing']) ? $_POST['sail_use_racing'] : "0";
    //     $sailUseCruising = isset($_POST['sail_use_cruising']) ? $_POST['sail_use_cruising'] : "0";
    //     $boatLocation = isset($_POST['boat_location']) ? $_POST['boat_location'] : null;
    //     $additionalInfo = isset($_POST['additional_info']) ? $_POST['additional_info'] : null;
    //     $newsletter = isset($_POST['newsletter']) ? $_POST['newsletter'] : "0";
    //
    //     $data = (object) array(
    //         "action" => isset($_POST['action']) ? $_POST['action'] : null,
    //         "first_name" => $firstName,
    //         "last_name" => $lastName,
    //         "email" => $email,
    //         "phone" => $phone,
    //         "address_1" => $address1,
    //         "address_2" => $address2,
    //         "city" => $city,
    //         "postcode" => $postcode,
    //         "contact_by_phone" => $contactByPhone,
    //         "contact_by_email" => $contactByEmail,
    //         "boat_type" => $boatType,
    //         "sail_type" => $sailType,
    //         "sail_use_racing" => $sailUseRacing,
    //         "sail_use_cruising" => $sailUseCruising,
    //         "boat_location" => $boatLocation,
    //         "additional_info" => $additionalInfo,
    //         "newsletter" => $newsletter
    //     );
    //
    //     $emailSender = new EmailSender();
    //     $emailSent = $emailSender->sendNewSailQuote($data);
    //     echo json_encode($emailSent);
    // }
}

require_once '../controller/send_emails.php';

$apiHandlerSendForms = new ApiHandlerSendForms();
$apiHandlerSendForms->handleRequest();
?>
