<?php
class Order
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function negate()
    {
        return new Money(-1 * $this->amount);
    }
    
    /**
     * function to send Mail
     */
    public function sendSwiftMailer($data)
    {
		    // Create the Transport
			$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
			  ->setUsername('sarfaraj.khokhar@hiddenbrains.in')
			  ->setPassword('Sarfaraj#9364')
			  ;

			// Create the Mailer using your created Transport
			$mailer = Swift_Mailer::newInstance($transport);

			$body = $this->getMailTemplate($data);
			
			// Create a message
			$message = Swift_Message::newInstance("Thank you for your order ".$data['customer_name'])
			  ->setFrom(array('hb.nikhil@hiddenbrains.in' => 'Nikhil Shah'))
			  ->setTo(array('info@edmondscommerce.co.uk' => 'Joseph'))
			  ->setBody("")
			  ->addPart($body, 'text/html')
			  ;

			// Send the message
			$result = $mailer->send($message);
			if($result) {
				return 1;
			} else {
				return 0;
			}
    }
    
	/**
     * function to get Mail Template
     */
    public function getMailTemplate($data)
    {
        
      Twig_Autoloader::register();
      
      try {
        // specify where to look for templates
        $loader = new Twig_Loader_Filesystem('templates');
        
        // initialize Twig environment
        $twig = new Twig_Environment($loader);
        
        // load template
        $template = $twig->loadTemplate('confirmation.tmpl');
        
        $delivery_address = array("address" => $data['address']['delivery']['address'], "city" => $data['address']['delivery']['city'], "state_code" => $data['address']['delivery']['state_code'], "postal_code" => $data['address']['delivery']['postal_code']);
        
        $invoice_address = array("address" => $data['address']['invoice']['address'], "city" => $data['address']['invoice']['city'], "state_code" => $data['address']['invoice']['state_code'], "postal_code" => $data['address']['invoice']['postal_code']);
        
        $card_address = array("address" => $data['address']['card']['address'], "city" => $data['address']['card']['city'], "state_code" => $data['address']['card']['state_code'], "postal_code" => $data['address']['card']['postal_code']);
        
        // set template variables
        // render template
        return $template->render(array(
          'customer_id' => $data['customer_id'],
          'customer_name' => $data['customer_name'],
          'order_number' => $data['order_number'],
          'total' => "2623.16",
          'products' => $data['product'],
          'delivery_address' => $delivery_address,
          'invoice_address' => $invoice_address,
          'card_address' => $card_address,
        ));
      
      } catch (Exception $e) {
        die ('ERROR: ' . $e->getMessage());
      }  
        
    }
}
