# Manual Test Matrix - SmartCafe Billing

## Business rules

| Constant | Giá trị | Ý nghĩa |
|---|---|---|
| CURRENCY | "VND" | Đơn vị tiền |
| MEMBER_MIN | 100000 | Subtotal tối thiểu để giảm giá |
| MEMBER_DISCOUNT_RATE | 0.10 | Giảm 10% cho MEMBER |
| PACKAGING_FEE_PER_ITEM | 2000 | Phí bao bì mỗi ly |
| SERVICE_RATE | 0.05 | Phí dịch vụ 5% trên giá trị sau discount |

- discount = (MEMBER và subtotal >= MEMBER_MIN) ? subtotal * 0.10 : 0
- total = subtotal - discount + packagingFee + serviceFee

## Test cases

| Case | Input | Expected | Actual | Kết luận |
|---|---|---|---|---|
| T1 - Happy path | price 45000, qty "3", MEMBER, available | subtotal 135000, discount 13500, packaging 6000, service 6075, total 133575, READY TO ORDER | subtotal 135000, discount 13500, packaging 6000, service 6075, total 133575, READY TO ORDER | Pass |
| T2 - No benefit | price 45000, qty "3", GUEST, available | discount 0, packaging 6000, service 6750, total 147750, READY TO ORDER | subtotal 135000, discount 0, packaging 6000, service 6750, total 147750, READY TO ORDER | Pass |
| T3 - Boundary | price 50000, qty "2", MEMBER, available | subtotal 100000 = MEMBER_MIN nên có discount 10000, packaging 4000, service 4500, total 98500, READY TO ORDER | subtotal 100000, discount 10000, packaging 4000, service 4500, total 98500, READY TO ORDER | Pass: subtotal = MEMBER_MIN vẫn được giảm giá vì dùng >= |
| T4 - Blocked | price 45000, qty "0", MEMBER, available | hasValidQuantity = false nên BLOCKED | quantity 0, subtotal 0, discount 0, packaging 0, service 0, total 0, BLOCKED | Pass: quantity = 0 nên hasValidQuantity = false, canOrder = false | 