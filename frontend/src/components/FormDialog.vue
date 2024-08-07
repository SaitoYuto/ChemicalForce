<template>
  <v-dialog v-model="visibility" max-width="500">
    <v-card :title="title">
      <v-card-text>
        <v-container>
          <v-row>
            <v-col
              cols="12"
              md="6"
              sm="6"
              v-for="(_, key) in formData"
              :key="key"
            >
              <v-text-field
                v-model="formData[key]"
                :label="key.toString().toUpperCase()"
                :readonly="key.toString() === 'id' && mode == 'edit'"
                :disabled="key.toString() === 'id' && mode == 'edit'"
              ></v-text-field>
            </v-col>
          </v-row>
        </v-container>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <BaseButton
          :text="UI.LABEL.CLOSE"
          :block="false"
          @click="close"
        ></BaseButton>
        <BaseButton :text="UI.LABEL.OK" :block="false" @click="ok"></BaseButton>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script lang="ts" setup>
import BaseButton from "@/atoms/BaseButton.vue";
import { UI } from "@/constants/UI";

defineExpose({
  open,
  close,
});

defineProps({
  title: {
    type: String,
    required: false,
    default: "",
  },
  mode: {
    type: String as PropType<"add" | "edit">,
    required: true,
  },
});

const emit = defineEmits();
const formData = ref<any>(null);
const visibility = defineModel("visibility", {
  type: Boolean,
  default: false,
});

/**
 * Open dialog
 *
 * @returns {void}
 * @author Yuto Saito
 */
function open<T>(data: T) {
  formData.value = data;
  visibility.value = true;
}

/**
 * User admit the form
 *
 * @returns {void}
 * @author Yuto Saito
 */
function ok(): void {
  emit("ok", formData.value);
}

/**
 * Close dialog
 *
 * @returns {void}
 * @author Yuto Saito
 */
function close(): void {
  visibility.value = false;
}
</script>
