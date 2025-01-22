<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- OTP -->
    <p>
        Semaphore also provides a simple and easy interface for generating OTP on the fly. Messages sent through this
        endpoint are routed to a SMS route dedicated to OTP traffic. This means your OTP traffic should still arrive
        even if telcos are experiencing high volumes of SMS.This service is 2 credits per 160 character SMS.

        Note: This endpoint is not rate limited

        https://api.semaphore.co/api/v4/otp

        This endpoint accepts the exact same payload as a regular message but you can specify where in the message to
        insert the OTP code by using the placeholder "{otp}"

        If you would like to specify your own OTP code and skip the auto-generated one, just pass a "code" parameter
        with your call.

        For instance using the message: "Your One Time Password is: {otp}. Please use it within 5 minutes." will return
        the message "Your One Time Password is: XXXXXX. Please use it within 5 minutes."

        The response is the same as a regular message but an additional code parameter is passed which indicates the
        auto-generated OTP or the OTP code you passed in the "otp" parameter:


        [
        {
        "message_id": 12345,
        "user_id": 54321,
        "user": "timmy@toolbox.com",
        "account_id": 987654,
        "account": "My Account",
        "recipient": "639998887777",
        "message": "Your OTP code is now 332200. Please use it quickly!",
        "code": 332200,
        "sender_name": "MySenderName",
        "network": "Globe",
        "status": "Pending",
        "type": "Single",
        "source": "Api",
        "created_at": "2020-01-01 01:01:01",
        "updated_at": "2020-01-01 01:01:01",
        }
        ]


        If you do not provide the placeholder, the OTP code will be appended to your original message. For instance if
        you send the message "Thanks for registering" the message will have the OTP appended to the end as "Thanks for
        registering. Your One Time Password is XXXXXX"

        curl --data "apikey=YOUR_API_KEY&number=MOBILE_NUMBER&message=Thanks for registering. Your OTP Code is {otp}."
        https://semaphore.co/api/v4/otp
        Please note that this service is designed for OTP traffic only. Please do not use this route to send regular
        messages.
    </p>
</body>

</html>