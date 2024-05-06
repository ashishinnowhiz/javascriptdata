from PIL import Image
import os

def resize_images(input_folder, output_folder, target_size):
    # Create output folder if it doesn't exist
    if not os.path.exists(output_folder):
        os.makedirs(output_folder)
    
    # Iterate through files in the input folder
    for root, _, files in os.walk(input_folder):
        for file in files:
            # Check if the file is an image
            if file.lower().endswith(('.png', '.jpg', '.jpeg', '.gif', '.bmp')):
                input_path = os.path.join(root, file)
                output_path = os.path.join(output_folder, file)
                try:
                    # Open the image
                    with Image.open(input_path) as img:
                        # Resize the image
                        img.thumbnail(target_size, Image.ANTIALIAS)
                        # Save the resized image
                        img.save(output_path)
                        print(f"Resized {file}")
                except Exception as e:
                    print(f"Error processing {file}: {e}")

# Example usage
input_folder = "input_images"
output_folder = "resized_images"
target_size = (300, 300)  # Set the target size here

resize_images(input_folder, output_folder, target_size)
