<a href="<?php echo $url ?>" class="slider-card">
  <div class="flex flex-col flex-shrink-0 h-full bg-white border border-gray-200 rounded-lg shadow <?php echo is_front_page() ? 'w-96' : '' ?>">
    <div class="flex item-center justify-center  h-48 <?php echo $bg_color ? "p-24 rounded-t-lg" : '' ?>" style="background:<?php echo $bg_color ? "$bg_color" : '' ?>">
      <img class="object-cover w-full rounded-t-lg" src="<?php echo $thumbnail ?>" alt="" />
    </div>
    <div class="flex flex-col justify-between h-full p-5">
      <div>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"><?php echo $title ?></h5>
        <p class="mb-3 font-normal text-gray-700"><?php echo $excerpt ?></p>
      </div>
      <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg w-fit hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
        Read more
        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
  </div>
</a>
