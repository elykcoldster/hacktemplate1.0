<div id="descriptions">
  <!-- Image Reconstruction -->
  <div id="imrecon" class="istar-label">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h2>3D Image Reconstruction</h2>
        </div>
      </div>
    </div>
  </div>
  <div id="imphystxt" class="istar-description">
    <div class="container" style="margin-top: 20px">
      <img style="float:left; margin-right: 40px"; src="assets/istar/comrecon.gif">
      <p>
        Known-component reconstruction (KCR) involves a novel approach to model-based 3D image reconstruction that simultaneously solves both a statistical / iterative reconstruction of the patient anatomy AND a registration of a known component (e.g., interventional device) somewhere within the image. The combined solution demonstrates enormous potential for improving image quality and eliminating artifacts that plague conventional reconstruction approaches that do not account for such strong prior information. KCR extensions include deformable components (dKCR) and statistically-known components (sKCR). Applications include imaging in the presence of surgical devices, implants, prosthesis, and more.
      </p>
    </div>
    <div class="container" style="margin-top:50px">
      <img style="float:right; margin-left: 40px"; src="assets/istar/statrecon.jpg">
      <p>
        A general penalized likelihood (PL) framework has been developed for model-based 3D image reconstruction in cone-beam CT, providing a valuable basis for novel reconstruction techniques such as KCR, PIR-PLE, and MCR and providing dramatic improvement in image quality compared to conventional FBP under conditions of low dose and/or sparsely sampled data. Increasingly sophisticated forward models within the PL framework leverage a knowledge of the imaging chain gained from cascaded systems analysis of detector efficiency, blur, electronic noise, and other non-idealities conventionally ignored in model-based reconstruction.
      </p>
    </div>
    <div class="container" style="margin-top: 50px; margin-bottom: 30px">
      <img style="float:left; margin-right: 40px"; src="assets/istar/lowdose.jpg">
      <p>
        The general model-based framework (including PL, PIR-PLE, KCR, etc.) with GPU-accelerated implementations provide an important basis for investigating the low-dose limits of imaging performance in a broad spectrum of applications. In image-guided interventions, for example, where repeat CBCT are acquired during the procedure, the PL framework demonstrates dramatic image quality improvements at a fraction of the scan dose compared to FBP.
      </p>
    </div>
  </div>
  
  <!-- Image Guided Surgery -->
  <div id="imguide" class="istar-label">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h2>Image Guided Surgery</h2>
        </div>
      </div>
    </div>
  </div>
  <div id="imphystxt" class="istar-description">
    <div class="container" style="margin-top: 20px">
      <img style="float:left; margin-right: 40px"; src="assets/istar/spinesurgery.jpg">
      <p>
        Next-generation image-guided spine surgery aims to incorporate high-performance intraoperative C-arm CBCT for improved image quality, soft-tissue visibility, and streamlined integration with guidance systems. Research includes translation of high-performance CBCT into the surgical suite in combination with a variety of application-specific navigation tools, advanced 3D reconstruction methods, fast deformable registration of preop and intraoperative images, novel tracking methods, and minimization of radiation dose to both the patient and surgical staff.
      </p>
    </div>
    <div class="container" style="margin-top:50px">
      <img style="float:right; margin-left: 40px"; src="assets/istar/sbhnsurgery.jpg">
      <p>
        The proximity of surgical targets to critical structures in the skull base presents a challenge even to experienced surgeons. Limited visualization of the surgical field, anatomical deformation, and a high cost of complication highlight the need for high-quality intraoperative imaging. High-quality C-arm CBCT offers 3D images with sub-mm spatial resolution, soft-tissue visibility, and dose sufficiently low to permit repeat intraoperative imaging. Integration with preoperative data, tracking, and endoscopy offers a system for high-precision skull base surgery that could extend image guidance to a broad spectrum of head and neck pathologies.
      </p>
    </div>
    <div class="container" style="margin-top: 50px; margin-bottom: 30px">
      <img style="float:left; margin-right: 40px"; src="assets/istar/thoracic.jpg">
      <p>
        Lung cancer remains the leading cancer killer, causing more deaths each year than the next two most common cancers (prostate and breast) combined. In its earliest stages, lung cancer is curable by surgery, and low-dose CT appears to offer a sensitive means of detecting lung tumors before they have spread. However, small tumors can be difficult to localize in surgery. C-arm cone-beam CT is being brought to bear in order to guide thoracic surgeons precisely to lung tumors in video-assisted thoracic surgery (VATS), potentially allowing surgeons to localize small tumors in the operating room and excise them precisely while sparing healthy lung tissue.
      </p>
    </div>
  </div>
  
  <!-- Image Registration -->
  <div id="imreg" class="istar-label">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h2>Image Registration</h2>
        </div>
      </div>
    </div>
  </div>
  <div id="imphystxt" class="istar-description">
    <div class="container" style="margin-top: 20px">
      <img style="float:left; margin-right: 40px"; src="assets/istar/defreg.jpg">
      <p>
        Deformable image registration is essential to accurately aligning information in the reference frame of the most up-to-date point in an interventional procedure. Research in the I-STAR Lab has developed a framework for fast deformable registration that adapts methods such as the Demons algorithm to applications in image-guided radiation therapy and a spectrum of image-guided surgeries. Extensions include robust implementation within a morphological pyramid, an intensity-invariant form allowing CT-to-CBCT registration, and a novel super-dimensional form allowing registration in the presence of missing tissue and/or devices introduced between image pairs.
      </p>
    </div>
    <div class="container" style="margin-top:50px">
      <img style="float:right; margin-left: 40px"; src="assets/istar/deflung.gif">
      <p>
        Deformable registration of the inflated and deflated lung is an important aspect of guiding minimally invasive trans-thoracic interventions (e.g., lung tumor surgery). We have developed a combined model-based (mesh and control points) registration and image-based (Demons) registration that is robust to large deformations and sufficiently accurate to guide the surgeon in relation to the target wedge, the tumor, and adjacent critical anatomy.
      </p>
    </div>
    <div class="container" style="margin-top: 50px; margin-bottom: 30px">
      <img style="float:left; margin-right: 40px"; src="assets/istar/xdd.jpg">
      <p>
        A novel approach to multi-dimensional deformable image registration (referred to as <b>Extra-Dimensional Demons, XDD</b>) is under development that exapnds the dimensionality of images in a manner that accoutns for tissue changes between the moving and fixed images (e.g., excised tissue or an interventional device in the latter). The algorithm explicitly models tissue discrepancies in in the process of tissue deformation. Excisions are accounted for by increasing the dimensionality of the solution so that deformations are represented by in-volume vectors while excisions are handled by out-of-volume vectors
      </p>
    </div>
  </div>
  
  <!-- Imaging Physics -->
  <div id="imphys" class="istar-label">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h2>Imaging Physics</h2>
        </div>
      </div>
    </div>
  </div>
  <div id="imphystxt" class="istar-description">
    <div class="container" style="margin-top: 20px">
      <img style="float:left; margin-right: 40px"; src="assets/istar/imphys.gif">
      <p>
        Among the most exciting areas of digital x-ray imaging physics over the last decade has been the development
        of cone-beam CT (CBCT) systems in a broad scope of applications ranging from diagnostic imaging to image-guided
        interventions. Enabled by the emergence of high-performance flat-panel x-ray detectors and fully 3D reconstruction
        techniques, the proliferation of CBCT raises new challenges in understanding fully 3D imaging performance
        (e.g., the fully 3D noise-power spectrum, noise-equivalent quanta, and task-based detectability) and new
        opportunities in a broad variety of innovative imaging platforms tailored to specific new applications and
        clinical tasks.
      </p>
    </div>
    <div class="container" style="margin-top:50px">
      <img style="float:right; margin-left: 40px"; src="assets/istar/conebeam.gif">
      <p>
        Dual-energy CT is rapidly proliferating in diagnostic and interventional imaging, offering improved material differentiation, soft-tissue visualization, an quantitative analysis with applications ranging from renal stone characterization to musculoskeletal imaging. Leveraging advanced 3D reconstruction methods and a rigorous understanding of signal and noise propagation in the 3D imaging chain, we have established a framework for DE-CBCT imaging performance analysis that highlights the factors governing tomographic performance in material decomposition / discimination and yields a basis for system optimization - e.g., selection of kVp pair and allocation of dose between high- and low-energy projections.
      </p>
    </div>
    <div class="container" style="margin-top: 50px; margin-bottom: 30px">
      <img style="float:left; margin-right: 40px"; src="assets/istar/imperf.jpg">
      <p>
        A general framework for modeling the 3D imaging chain has been realized through cascaded systems analysis of signal and noise propagation from the x-ray source through the detector system and reconstruction algorithm. Such models provide a powerful framework for system design and optimization and reveal complex tradeoffs among quantum noise, anatomical background, source-detector orbit, detector design, reconstruction algorithm, and radiation dose. An understanding of the factors governing 3D imaging performance provides a rigorous basis for system development and translation.
      </p>
    </div>
  </div>
</div>