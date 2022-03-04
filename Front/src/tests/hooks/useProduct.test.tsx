import { renderHook } from "@testing-library/react-hooks";
import {setupServer} from "msw/node";
import {rest} from "msw";
import {mockedProduct} from "../../mocks/mocks";
import {endpoint} from "../../App";
import useProduct from "../../hooks/useProduct";

const server = setupServer(
    rest.get(`${endpoint}/product/20`, (req, res, ctx) => {
        return res(ctx.json(mockedProduct))
    }),
    rest.post(`${endpoint}/cart/20`, (req, res, ctx) => {
        return res(ctx.json({}));
    }),
)

beforeAll(() => server.listen());
afterEach(() => server.resetHandlers());
afterAll(() => server.close());

test("addProduct", async () => {
    const { result } = renderHook(() => useProduct(mockedProduct));
    let loadingResult = await result.current.addProduct();
    expect(loadingResult).toEqual(true);
});
