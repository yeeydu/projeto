<!--
<footer class="footer">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
				<p class="text-muted mb-0">&copy; {{ now()->format('Y') }} Design by Cesae Team Y.</p>
			</div>
				<div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
					<div class="d-flex footer__social">
						<a class="footer__social-link" href="https://www.facebook.com/diogopintoweddings" target="_blank">
							<i class="fab fa-facebook"></i>
						</a>
						<a class="footer__social-link" href="https://www.instagram.com/diogopintophoto.video" target="_blank">
							<i class="fab fa-instagram"></i>
						</a>
						<a class="footer__social-link" href="https://www.youtube.com/channel/UC-xSYYun9UPBDbMgf9_z_0w" target="_blank">
							<i class="fab fa-youtube"></i>
						</a>
					</div>
				</div>
		</div>
	</div>
 <footer>
--->
<!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#443549" fill-opacity="1" d="M0,96L720,320L1440,160L1440,320L720,320L0,320Z"></path></svg> -->
  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-dark"
          style="background-color: #ECEFF1"
          >
    <!-- Section: Social media -->
    <section
             class="d-flex justify-content-between p-4 text-white"
             style="background-color: #443549"
             >
      <!-- Left -->
       <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-3">
 
        <span>Siga-nos nas redes sociais:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
     <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-3">
 
		<a class="footer__social-link text-white" href="https://www.facebook.com/diogopintoweddings" target="_blank">
			<i class="fab fa-facebook"></i>
		</a>
		<a class="footer__social-link text-white" href="https://www.instagram.com/diogopintophoto.video" target="_blank">
			<i class="fab fa-instagram"></i>
		</a>
		<a class="footer__social-link text-white" href="https://www.youtube.com/channel/UC-xSYYun9UPBDbMgf9_z_0w" target="_blank">
			<i class="fab fa-youtube"></i>
		</a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-4">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-3">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">Diogo Pinto</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #443549; height: 2px"
                />
            <p>
              Empresa de confiança e alto nível de professionalismo.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-3">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Serviços</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #443549; height: 2px"
                />
            <p>
              <a href="fotografias" class="text-dark">Fotografia</a>
            </p>
            <p>
              <a href="videos" class="text-dark">Video</a>
            </p>
          
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-3">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Links Úteis</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #443549; height: 2px"
                />
            <p>
              <a href="politica-de-cookies" class="text-dark">Política de Cookies</a>
            </p>
            <p>
              <a href="politica-de-privacidade" class="text-dark">Política de Privacidade</a>
            </p>
        
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-3">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contacto</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #443549; height: 2px"
                />
            <p><i class="fas fa-envelope mr-3"></i> geral@diogopinto.pt</p>
            <p><i class="fas fa-phone mr-3"></i> +351 916 884 127</p>
             
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)">
		 <p class="text-dark mb-0" > &copy; {{ now()->format('Y') }} Design by Cesae Team Y.</p>
    </div>
    <!-- Copyright -->

 
  </footer>
  <!-- Footer -->

<!-- End of .container -->

  <!-- Cookie Consent -->
@include('cookieConsent::index')

 <!-- Main JS -->
 <script src="js/app.min.js "></script>
 <script src="//localhost:35729/livereload.js"></script>

  <!---Share Social Buttons -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script> 

 