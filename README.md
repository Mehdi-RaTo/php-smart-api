# PHP Smart API
Developing a smart API with a simple structure.

## 1️⃣ Create
Create a file named `Yow.php` in the path `/API/Services/` and place the following code in it.

```php
<?php class Yow extends APIService
{
    function Run()
    {
        // return all parameters as result
        return $this->params;
    }
}
```

➕ More examples in `/API/Services/`

## 2️⃣ Use
Fetch by JavaScript

```javascript
fetch("https://example.com/API/GetService.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify({
        "ServiceName": "Yow",
        "Parameters": {
            "FirstName": "Mehdi",
            "LastName": "RaTo"
        }
    })
}).then((response) => response.json()).then((response) => {
    console.log(response);
}).catch((error) => {
    console.log(error);
});
```

➕ Look at `usage.html` file for a better understanding.

## 💡 Request/Response Model

### 🔼 Request
```json
{
    "ServiceName": "string",
    "Parameters": "object"
}
```

### 🔽 Response
```json
{
    "IsSuccess": "boolean",
    "StatusCode": "integer",
    "Message": "string",
    "Result": "any"
}
```
