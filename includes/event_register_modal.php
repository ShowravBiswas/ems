<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Event Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Event:</strong> <span id="event_name"></span></p>
                <p><strong>Description:</strong> <span class="justify-text" id="event_description"></span></p>
                <p><strong>Date:</strong> <span id="event_date"></span></p>
                <p><strong>Venue:</strong> <span id="event_venue"></span></p>

                <!-- Registration Form -->
                <form id="registerForm">
                    <input type="hidden" id="event_id" name="event_id">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone_no" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {

        $(".register-btn").click(function () {
            let eventId = $(this).data("id");
            $.post("scripts/check_capacity.php", { event_id: eventId }, function (response) {
                let data = JSON.parse(response);
                if (data.status === "available") {
                    $("#event_name").text(data.event_name);
                    $("#event_description").text(data.description);
                    $("#event_date").text(data.event_date);
                    $("#event_venue").text(data.venue);
                    $("#event_id").val(eventId);

                    $("#registerModal").modal("show");
                } else {
                    alert("This event is fully booked.");
                }
            });
        });

        $("#registerForm").submit(function (e) {
            e.preventDefault();
            $.post("scripts/register_attendee.php", $(this).serialize(), function (response) {
                let data = JSON.parse(response); // Correct JSON decoding

                console.log(data.status); // Log the correct response

                if (data.status === "success") {
                    alert("Registration Successful!");
                    $("#registerModal").modal("hide");

                    // Reset fields after successful submission
                    $("#event_name, #event_date, #event_venue").text(''); // For non-input elements
                    $("#event_description").text('');
                    $("#event_id").val(''); // For input fields
                    $("#registerForm")[0].reset(); // Reset form inputs
                }
                if(data.status === "error" || data.status === "duplicate"){
                    alert(data.message);
                }
            }).fail(function () {
                alert("Error processing request.");
            });
        });
    });
</script>
