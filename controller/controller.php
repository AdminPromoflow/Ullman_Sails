<?php
class ApiHandlerSendForms {
    public function handleRequest() {
        header('Content-Type: application/json');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $action = isset($_POST['action']) ? $_POST['action'] : null;

            if ($action === null) {
                http_response_code(400);
                echo json_encode(array("message" => "Missing action"));
                return;
            }

            switch ($action) {
                case "send_emal_contact_us":
                    $this->handleContactUs();
                    break;

                default:
                    http_response_code(400);
                    echo json_encode(array("message" => "Unknown action"));
                    break;
            }
        } else {
            http_response_code(405);
            echo json_encode(array("message" => "Method not allowed"));
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
}

require_once '../controller/send_emails.php';

$apiHandlerSendForms = new ApiHandlerSendForms();
$apiHandlerSendForms->handleRequest();
?>
