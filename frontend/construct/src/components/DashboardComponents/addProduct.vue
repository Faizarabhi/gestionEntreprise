<template>
  <div class="modal" id="update_product">
    <div class="modal-box relative">
      <label
        for="my-modal-3"
        class="btn btn-sm btn-circle absolute right-2 top-2"
        >✕</label
      >
      <h3 class="text-lg font-bold">Update Product!</h3>
      <input v-model="form.id" disabled />
      <div class="form-control w-full max-w-xs">
        <label class="label">
          <span class="label-text">Reference produit</span>
        </label>
        <input
          type="text"
          placeholder="Type here"
          class="input input-bordered w-full max-w-xs"
          v-model="form.ref_prdt"
        />
      </div>
      <div class="form-control w-full max-w-xs">
        <label class="label">
          <span class="label-text">Designation produit</span>
        </label>
        <input
          type="text"
          placeholder="Type here"
          class="input input-bordered w-full max-w-xs"
        />
      </div>
      <div class="form-control w-full max-w-xs">
        <label class="label">
          <span class="label-text">unite produit</span>
        </label>
        <input
          type="text"
          placeholder="Type here"
          class="input input-bordered w-full max-w-xs"
          v-model="form.unite"
        />
      </div>
      <div class="form-control w-full max-w-xs">
        <label class="label">
          <span class="label-text">Categorie produit</span>
        </label>
        <input
          type="text"
          placeholder="Type here"
          class="input input-bordered w-full max-w-xs"
          v-model="form.categorie"
        />
      </div>
      <div class="modal-action">
        <a
          @click="updateProduct(form.id)"
          href="#"
          for="my-modal-3"
          class="btn bg-dash-bleu hover:bg-scroll-bleu"
          >Update
        </a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      name: "",
      search: "",
    };
  },
  props: {
    form: Object,
    update: Function,
  },
};
</script>
