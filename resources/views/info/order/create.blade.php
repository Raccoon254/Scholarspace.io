<x-logged-out>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">How to Create an Order</h1>
        <p class="mb-6">
            Creating an order in our system is a straightforward process that involves filling out a form with the necessary details. Follow the steps below to create a new order:
        </p>

        <h2 class="text-2xl font-semibold mb-4">Steps to Create an Order</h2>

        <ol class="list-decimal list-inside mb-6">
            <li class="mb-4">
                <strong>Log In:</strong> Ensure you are logged in to your account. If you don't have an account, please <a href="{{ route('register') }}" class="text-blue-500 underline">register here</a>.
            </li>
            <li class="mb-4">
                <strong>Navigate to the Order Creation Page:</strong> Go to the <a href="{{ route('orders.create') }}" class="text-blue-500 underline">Order Creation Page</a>. This page contains the form you need to fill out.
            </li>
            <li class="mb-4">
                <strong>Fill Out the Form:</strong> Provide the required information in the form:
                <ul class="list-disc bg-blue-500 p-4 rounded-lg text-white list-inside mt-2">
                    <li><strong>Title:</strong> Enter a descriptive title for your order.</li>
                    <li><strong>Description:</strong> Provide a detailed description of the order requirements.</li>
                    <li><strong>Calculation Mode:</strong> Choose whether to calculate the order based on the number of words or pages.</li>
                    <li><strong>Number of Words or Pages:</strong> Depending on your selection, enter the number of words or pages.</li>
                    <li><strong>Total Price:</strong> The total price will be calculated automatically based on the number of words or pages.</li>
                    <li><strong>Attachments:</strong> You can add any relevant files or documents to your order.</li>
                </ul>
            </li>
            <li class="mb-4">
                <strong>Submit the Form:</strong> Once you have filled out all the fields, click the "Create Order" button. This will validate your input and create the order if everything is correct.
            </li>
            <li class="mb-4">
                <strong>Payment:</strong> After creating the order, you will be redirected to the payment page to complete the payment process.
            </li>
        </ol>

        <h2 class="text-2xl font-semibold mb-4">Form Fields and Validations</h2>

        <ul class="list-disc bg-blue-500 p-4 rounded-lg text-white list-inside mb-6">
            <li><strong>Title:</strong> Required, must be a string, and not exceed 255 characters.</li>
            <li><strong>Description:</strong> Required, must be a string.</li>
            <li><strong>Total Price:</strong> Required, must be a numeric value.</li>
            <li><strong>Attachments:</strong> Optional, each file must not exceed 10MB.</li>
        </ul>

        <h2 class="text-2xl font-semibold mb-4">Calculation Modes</h2>

        <p class="mb-6">
            The system offers two modes for calculating the total price of an order:
        </p>

        <ul class="list-disc list-inside mb-6">
            <li><strong>By Words:</strong> The price is calculated based on the number of words, with a rate of $15 per 275 words.</li>
            <li><strong>By Pages:</strong> The price is calculated based on the number of pages, with a fixed rate of $15 per page.</li>
        </ul>

        <h2 class="text-2xl font-semibold mb-4">Adding Attachments</h2>

        <p class="mb-6">
            You can attach files to your order. Each file must not exceed 10MB in size. Supported file types include images, PDFs, Word documents, and compressed files.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Order Status</h2>

        <p class="mb-6">
            When an order is created, it is assigned a status of "pending." After the payment is completed, the status will be updated accordingly.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Redirecting to Payment</h2>

        <p class="mb-6">
            After successfully creating an order, you will be redirected to the payment page where you can complete the payment process. The payment page will display the total amount due for your order.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Resetting the Form</h2>

        <p class="mb-6">
            Once the order is created, the form fields will be reset to their default values, allowing you to create a new order if needed.
        </p>

        <h2 class="text-2xl font-semibold mb-4">Removing Attachments</h2>

        <p class="mb-6">
            If you need to remove an attachment, simply click the "Remove" button next to the attachment in the list. This will remove the attachment from the order.
        </p>
    </div>
</x-logged-out>
