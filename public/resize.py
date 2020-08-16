import cv2
import time
import glob # ファイル読み込みで使用
import os # フォルダ作成で使用

# img_size : 一辺がこの大きさに切り取る
img_size = 300
w = img_size // 2

for fold_path in glob.glob('../storage/app/public/photo_images/origin_del/*'):
    count = 0

    # 画像全部のディレクトリリスト
    imgs = glob.glob(fold_path + '/*')
    # 画像保存先のフォルダ名
    save_path = fold_path.replace('origin_del','resized')

    # 保存先のフォルダがなかったら、フォルダ作成
    if not os.path.exists(save_path):
        os.makedirs(save_path)

    # 画像ごとに処理
    for img_path in imgs:
        img = cv2.imread(img_path, cv2.IMREAD_COLOR)
        print(img_path)
        x, y = img.shape[1] // 2, img.shape[0] // 2,
        new_img = img[max([0, y - w]) : y + w, max([0, x - w]) : x + w]
        resized_img = cv2.resize(new_img, (2*w, 2*w))
        ut = time.time()
        save_img_path = save_path + '/' + str(ut) + '.jpg'
        cv2.imwrite(save_img_path, resized_img)
        os.remove(img_path)

print("リサイズ完了");
