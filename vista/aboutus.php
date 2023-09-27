<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        
        h1 {
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        .about-content {
            margin-top: 20px;
        }
        
        p {
            margin: 0 0 20px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>About Us</h1>
    </header>
    <div class="container">
        <div class="about-content">
            <h2>Our Story</h2>
            <p>We are people that we suffered violence in our relationships. And we want to help you to avoid violence in your life</p>
            <h2>Our Team</h2>
            <p>We are a dedicated team of professionals working together to achieve our goals. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <h2>Our Mission</h2>
            <p>Our mission is to provide high-quality products and excellent service to our customers. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
    <script>
  window.watsonAssistantChatOptions = {
    integrationID: "b5720f5e-69c2-4db5-9923-cb183ac44279", // The ID of this integration.
    region: "us-east", // The region your integration is hosted in.
    serviceInstanceID: "409cab03-959f-4d95-991c-8b1d8852b2af", // The ID of your service instance.
    onLoad: function(instance) { instance.render(); }
  };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
    document.head.appendChild(t);
  });
</script>
</body>
</html>
