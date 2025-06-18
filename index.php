<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Inventory Management</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add this inside the <head> tag to include GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script>
        gsap.registerPlugin(ScrollTrigger);
    </script>


</head>

<body>
    <?php include "header.php"; ?>

    <main>
        <section class="section-1">
            <div>
                <h1 class="heading-top">Agriculture Inventory Management</h1>
            </div>
        </section>
        <section class="section-2">
            <div><img src="./images/agriculture-inventory-management-with-Acctivate.jpg" alt=""></div>
            <p>A solution for <i>agriculture inventory management</i> delivers full operational visibility and control
                to agribusinesses that supply farmers and growers. </p>
        </section>

        <section class="section-3">
            <div class="section-3-top">
                <p class="section-3-top-p1">Agriculture inventory management software for efficient sales and
                    fulfillment</p>
                <div class="img-sead"><img
                        src="./images/agriculture-inventory-management-helps-optimize-sales-fulfillment.jpg" alt="">
                </div>
                <p class="section-3-top-p2">With inventory stocked accurately and everyone in the company informed with
                    real-time data, order management and fulfillment are simplified; and customers remain satisfied with
                    on-time deliveries as promised.</p>
            </div>
            <div class="section-3-bottom">
                <p class="section-3-bottom-p1">Acctivate agriculture inventory management software supports:</p>
                <li>Paperless picking & automation of warehouse activities with barcoding, mobile, & wireless
                    technologies.</li>
                <li>Enhanced customer communication with automated customer email notifications of the order status and
                    shipment tracking information.</li>
                <li>Integration with USPS, FedEx, UPS & DHL, and other shipping services.</li>
                <li>Easy export of orders to 3PL vendor and import quantity shipped & tracking numbers.</li>
                <li>EDI sales to big box retailers with palletization/packaging management.</li>
                <li>eCommerce platform integration for online web store sales.</li>
            </div>
        </section>

        <section class="section-4">
            <div class="section-4-top">
                <h1 class="section-4-top-h1">Agriculture inventory management software for manufacturing</h1>
                <div class="section-4-img-1"><img src="./images/agriculture-inventory-management-optimization.jpg"
                        alt=""></div>
                <p class="section-4-top-p1">Whether an agribusiness produces products using food ingredients, chemical
                    formulas, or parts for equipment, agriculture inventory management with Acctivate helps them oversee
                    the manufacturing process. All production processes are enhanced with multi-level bill of materials
                    to specify components/ingredients, workflow management capabilities, product lot and serial number
                    traceability, and more to deliver superior visibility.</p>
            </div>
            <div class="section-4-bottom">
                <li>Manage formulas or recipes with the ability to adjust accordingly for ingredient and yield
                    variations.</li>
                <li>Build products with components/parts as kits ordered on demand or assemblies made for stocking.</li>
                <li>Accommodate kit and assembly customizations when there are one-off adjustments to component
                    quantities or component removals/additions.</li>
            </div>
        </section>

        <section class="section-5">
            <div>
                <h1>Happy Clients</h1>
                <hr>
            </div>

            <div class="section-5-cards">
                <div class="section-5-cards-left">
                    <div class="section-5-cards-left-1">
                        <p>This Agriculture Inventory Management System has completely transformed the way we track and manage our farm supplies. The system is easy to use, highly accurate, and saves us valuable time. We no longer worry about stock shortages or mismanaged items.<b>The team provided great support and delivered exactly what we needed to run our farm more efficiently.</b></p>
                        <div>
                            <p><i><b>Mohit Maneshwar,</b></i></p>
                            <p>Student, SPU</p>
                        </div>
                    </div>
                    <div class="section-5-cards-left-2">
                        <p>Managing inventory across multiple fields and storage units was a huge challenge for us, but this system made it simple and organized. The real-time updates and detailed reporting have improved our planning and purchasing decisions.<b>The development team was responsive, professional, and truly understood the needs of modern farmers.</b></p>
                        <div>
                            <p><i><b>Om Bisen,</b></i></p>
                            <p>Student, SPU</p>
                        </div>
                    </div>
                </div>
                <div class="section-5-cards-right">
                    <div class="section-5-cards-right-1">
                        <p>We are very happy with this system as it has streamlined our daily operations. From seed stock to fertilizer tracking, everything is now properly recorded and easily accessible. The software helped us reduce waste and improve productivity.<b>I would recommend this system to any farm or agricultural business looking for reliable inventory control.</b></p>
                        <div>
                            <p><i><b>Tarni Marthe,</b></i></p>
                            <p>Student, SPU</p>
                        </div>
                    </div>
                    <div class="section-5-cards-right-2">
                        <p>This Agriculture Inventory Management System has been a valuable addition to our business. It helped us keep accurate records of all our tools, machinery, and crop supplies in one place. The simple interface, combined with detailed stock reports, made managing our inventory a hassle-free task.<b>The team provided excellent after-sales support.</b></i></p>
                        <div>
                            <p><i><b>Mansi Pache,</b></i></p>
                            <p>Student, SPU</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-6">
            <div>
                <h1>Contact Us</h1>
                <hr>
            </div>

            <div class="form-section">
                <form action="" class="form-contact">
                    <div>
                        <label>Name:</label>
                        <input type="text" name="" id="" placeholder="Your Name">
                    </div>
                    <div>
                        <label>Email:</label>
                        <input type="email" name="" id="" placeholder="Your Name">
                    </div>
                    <div>
                        <label>Message:</label>
                        <textarea class="input" name="" id="" placeholder="Enter Your Message"></textarea>
                    </div>
                    <div>
                        <center><button>Send Message</button></center>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <div>
            <p>&copy; 2025 <a href="">AG inventory management system</a>, All rights reserved.</p>
        </div>
    </footer>

    <!-- Place this just before the closing </body> tag -->
    <script>
        // Animate heading on load
        gsap.from(".heading-top", {
            duration: 1.2,
            y: -50,
            opacity: 0,
            ease: "power2.out"
        });

        // Animate image in section 2
        gsap.from(".section-2 img", {
            duration: 1.2,
            x: -100,
            opacity: 0,
            scrollTrigger: {
                trigger: ".section-2",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });

        // Animate section-3 text and image
        gsap.from(".section-3-top-p1, .img-sead img, .section-3-top-p2", {
            duration: 1,
            opacity: 0,
            y: 40,
            stagger: 0.3,
            scrollTrigger: {
                trigger: ".section-3",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });

        // Animate section-4 image and text
        gsap.from(".section-4-top-h1, .section-4-img-1 img, .section-4-top-p1", {
            duration: 1,
            opacity: 0,
            x: -50,
            stagger: 0.3,
            scrollTrigger: {
                trigger: ".section-4",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });

        // Animate testimonials (section-5)
        gsap.from(".section-5-cards-left > div, .section-5-cards-right > div", {
            duration: 1,
            opacity: 0,
            y: 30,
            stagger: 0.2,
            scrollTrigger: {
                trigger: ".section-5",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });

        // Animate contact form
        gsap.from(".form-contact > div", {
            duration: 0.8,
            opacity: 0,
            y: 20,
            stagger: 0.2,
            scrollTrigger: {
                trigger: ".section-6",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });
    </script>

</body>

</html>