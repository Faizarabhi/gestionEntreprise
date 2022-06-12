import { cloudinaryConfig } from "./constants";
import axios from "axios";
export function toFormData(data) {
  const formData = new FormData();
  Object.entries(data).forEach(([key, val]) => {
    formData.append(key, val);
  });
  return formData;
}

export function getCloudinaryImgUrl(publicId) {
  return `https://res.cloudinary.com/${cloudinaryConfig.cloudName}/image/upload/v1654771394/${publicId}.jpg`;
}

async function getUploadAuthentication() {
  const res = await axios.post(
    "http://localhost/filrouge/backend/CloudinaryController/getSignature"
  );
  return res.data;
}

export async function uploadToCloudinary(file) {
  const uploadAuth = await getUploadAuthentication();
  const cloudinaryData = {
    timestamp: uploadAuth.timestamp,
    signature: uploadAuth.signature,
    api_key: cloudinaryConfig.apiKey,
    file,
    folder: cloudinaryConfig.folder,
  };

  const formData = toFormData(cloudinaryData);
  const url = `https://api.cloudinary.com/v1_1/${cloudinaryConfig.cloudName}/image/upload`;
  const fileData = await axios.post(url, formData).then((res) => res.data);
  return fileData.public_id;
}
