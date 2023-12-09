<template>
  <div class="front_donate_flow">
    <div class="unit">
      <div class="box box1">

        <div class="number -on" :class="{ '-on': $route.name === 'donate' }">1</div>
        <div class=" text -on" :class="{ '-on': $route.name === 'donate' }">捐款內容</div>
        <div class="link"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
            <path
              d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
          </svg></div>
      </div>
    </div>
    <div class="unit">
      <div class="box box2">
        <div class="number -on" :class="{ '-on': $route.name === 'donate_basicinformation' }">2</div>
        <div class="text -on" :class="{ '-on': $route.name === 'donate_basicinformation' }">填寫資料</div>
        <div class="link"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
            <path
              d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
          </svg></div>
      </div>

    </div>
    <div class="unit">
      <div class="box box3">
        <div class="number" :class="{ '-on': $route.name === 'donate_finish' }">3</div>
        <div class="text" :class="{ '-on': $route.name === 'donate_finish' }">線上付款</div>
        <div class="link"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
            <path
              d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
          </svg></div>
      </div>

    </div>
    <div class="unit">
      <div class="box box4">
        <div class="number" :class="{ '-on': $route.name === 'donate_finish' }">4</div>
        <div class="text" :class="{ '-on': $route.name === 'donate_finish' }">付款狀態</div>

      </div>

    </div>
  </div>
</template>


<script>

</script>

