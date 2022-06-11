                


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Bill no : <?php echo $_GET['bno']; ?></h5>
                </div>
                <div class="modal-body">
                
                    <div class="d-flex flex-wrap  justify-content-around p-3" style="width: 100%;position:relative ;overflow: hidden;">
                        <div class="p-2 " style="width:25rem ;height: 22rem; ">
                            <!-- <h3 class="fw-bold m-3 text-uppercase text-center">Sender Details</h3> -->
                            <div class="col-10 m-3">
                                <label for="sendername" class="form-label">Sender Name</label>
                                <input type="text" class="form-control" name="sendername1" id="sendername1"  >
                                <input type="text" class="form-control" name="senderid1" id="senderid1" value="<?php echo $data1['senderid']; ?>"  hidden>
                                <input type="text" class="form-control" name="billno1" id="billno1" value="<?php echo $_GET['bno']; ?>"  hidden>
                            </div>
                            <div class="col-10 m-3">
                                <label for="sendercontact" class="form-label">Sender Contact No</label>
                                <input type="number" class="form-control" name="sendercontact1" id="sendercontact1" >
                            </div>
                            <div class="col-10 m-3">
                                <label for="inputAddress" class="form-label">Sender Address</label>
                                <textarea class="form-control" id="senderaddress1" name="senderaddress1" rows="3" ></textarea>
                            </div>
                        </div>
                        <div class="p-2" style="width:25rem ;position: relative;height: 22rem;">
                            <!-- <h3 class="fw-bold m-3 text-uppercase text-center">Receiver Details</h3> -->
                            <div class="col-10 m-3">

                                <label for="inputEmail4" class="form-label">Receiver Name</label>
                                <input type="text" class="form-control" name="receivername1" id="receivername1" >
                                <input type="text" class="form-control" name="receiverid1" id="receiverid1" value="<?php echo $data1['receiverid']; ?>"  hidden>
                            </div>
                            <div class="col-10 m-3">
                                <label for="inputPassword4" class="form-label">Receiver Contact No</label>
                                <input type="number" class="form-control" name="receivercontact1" id="receivercontact1">
                            </div>
                            <div class="col-10 m-3">
                                <label for="inputAddress" class="form-label">Receiver Address</label>
                                <textarea class="form-control" id="receiveraddress1" name="receiveraddress1" rows="3"></textarea>
                            </div>
                        </div>

                        <div class=" p-1  row g-3 container " style="position:relative;width :33rem">
                            <div class="col-md-3 m-3">
                                <label for="date" class="form-label">Billing Date</label>
                                <input type="date" class="form-control" value="<?php echo $data['date'] ?>" id="billingdate1" name="billingdate1">
                            </div>
                            <div class="col-md-3 m-3">
                                <label for="service" class="form-label">Courier Service</label>
                                <select class="form-select" aria-label="Default select example" name="service1" id="service1">
                                    <option value="0">Choose Service</option>
                                    <option value="UPS">UPS</option>
                                    <option value="FEDEX">FedEx</option>
                                    <option value="DHL">DHL</option>
                                </select>
                            </div>
                            <div class="col-md-3 m-3">
                                <label for="Quantity" class="form-label">Quantity</label>
                                <input type="text" class="form-control" id="quantity1" name="quantity1" value="<?php echo $data1['quantity'] ?>">
                            </div>
                            <div class="col-md-5 m-3">
                                <label for="tracking" class="form-label">Tracking No</label>
                                <input type="number" class="form-control" name="trackingno1" id="trackingno1" value="<?php echo $data['trackingno'] ?>">
                            </div>

                            <div class="col-md-5 m-3">
                                <label for="items" class="form-label">Items</label>
                                <textarea class="form-control" id="items1" rows="3" name="items1" value="<?php echo $data1['item'] ?>"></textarea>
                            </div>

                        </div>
                        <div class="p-1 row g-3" style="position:relative ;width :33rem">
                            <div class="col-md-10 m-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="number" class="form-control" id="weight1" name="weight1" value="<?php echo $data1['weight'] ?>">
                            </div>
                            <div class="col-md-5 m-3">
                                <label for="source" class="form-label">Source Country</label>
                                <input type="text" class="form-control" id="source1" name="source1" value="<?php echo $data1['source'] ?>">
                            </div>
                            <div class="col-md-5 m-3">
                                <label for="destination" class="form-label">Destination Country</label>
                                <input type="text" class="form-control" id="destination1" name="destination1" value="<?php echo $data1['destination'] ?>">
                            </div>

                            <div class="col-md-5 m-3">
                                <label for="cost" class="form-label">Total Cost </label>
                                <input type="number" class="form-control" readonly id="cost1" name="cost1" >
                            </div>
                            <div class="col-md-5 m-3">
                                <label for="method" class="form-label">Payment Method</label>
                                <select class="form-select" aria-label="Default select example" id="paymentmethod1" name="paymentmethod1">
                                    <option value="0">Select Payment Method</option>
                                    <option value="online-transfer">Online-transfer</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="cash">Cash</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="updatebtn" id="updatebtn" form="form2">Update</button>
                </div>

            </div>

        </div>
    </div>

